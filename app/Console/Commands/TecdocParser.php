<?php

namespace App\Console\Commands;

use App\Models\AttributeType;
use App\Models\AttributeGroup;
use App\Models\AutoEngine;
use App\Models\AutoEngineAttribute;
use App\Models\AutoEngineAttributeGroup;
use App\Models\AutoEngineAttributeType;
use App\Models\AutoMark;
use App\Models\AutoModel;
use App\Models\AutoModification;
use App\Models\ModificationAttribute;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Psy\Util\Str;

class TecdocParser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tecdoc:parser';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tecdoc parser';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
       $this->parseMarks();
       $this->parseModels();
       $this->parseAttrGroups();
       $this->parseAttrTypes();
       $this->parseModifications();

       $this->parseModificationAttributes();
//
       $this->parseEngines();
       $this->parseEngineAttrGroups();
       $this->parseEngineAttrTypes();
       $this->parseEngineAttributes();
       $this->parseEngineModificationRelations();
    }

    public function parseMarks() {
        // Марки
        $items = DB::connection('tecdoc')
            ->table('manufacturers')
            ->select('id as tecdoc_id', 'description as name', 'fulldescription as description', 'matchcode')
            ->where(['ispassengercar' => 'True'])
            ->get();
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AutoMark::firstOrCreate([
                'tecdoc_id' => $arr['tecdoc_id'],
                'name' => $arr['name'],
            ]);
            $model->fill($arr);
            $model->save();

            echo "Model ". $model->id . " saved \n";
        }
    }

    public function parseModels() {
        /**
         * Модели
         */

        $marks = AutoMark::all();

        $marks->each(function($mark) {
            $items = DB::connection('tecdoc')
                ->table('models')
                ->select('id as tecdoc_id', 'description', 'fulldescription as full_description', 'constructioninterval')
                ->where(['canbedisplayed' => 'True'])
                ->where(['ispassengercar' => 'True'])
                ->where(['manufacturerid' => $mark->tecdoc_id])
                ->get();
            foreach ($items as $item) {
                $arr = (array)$item;
                $construction_interval = explode(" - ", $arr['constructioninterval']);
                $arr['date_start'] = Carbon::createFromFormat('d.m.Y', '01.'. $construction_interval[0]);
                if ($construction_interval[1] && $construction_interval[1] != '') {
                    $arr['date_end'] = Carbon::createFromFormat('d.m.Y', '01.'. $construction_interval[1]);

                }
                $arr['auto_mark_id'] = $mark->id;

                unset($arr['constructioninterval']);
                $model = AutoModel::firstOrCreate([
                    'tecdoc_id' => $arr['tecdoc_id'],
                    'auto_mark_id' => $arr['auto_mark_id'],
                ]);
                $model->fill($arr);
                $model->save();

                echo "Model ". $model->id . " saved \n";
            }
        });
    }

    /**
     * Модификации
     */
    public function parseModifications() {
        $models = AutoModel::all();

        $models->each(function($model) {
            $items = DB::connection('tecdoc')
                ->table('passanger_cars')
                ->select('id as tecdoc_id', 'description', 'fulldescription as full_description', 'constructioninterval')
                ->where(['canbedisplayed' => 'True'])
                ->where(['ispassengercar' => 'True'])
                ->where(['modelid' => $model->tecdoc_id])
                ->get();
            foreach ($items as $itemKey => $item) {
                $arr = (array)$item;
                $construction_interval = explode(" - ", $arr['constructioninterval']);
                $arr['date_start'] = Carbon::createFromFormat('d.m.Y', '01.'. $construction_interval[0]);
                if ($construction_interval[1] && $construction_interval[1] != '') {
                    $arr['date_end'] = Carbon::createFromFormat('d.m.Y', '01.'. $construction_interval[1]);

                }
                $arr['auto_model_id'] = $model->id;


//                unset($arr['constructioninterval']);
//                $modification = AutoModification::firstOrCreate($arr);
                $modification = AutoModification::firstOrCreate([
                    'tecdoc_id' => $arr['tecdoc_id'],
                    'auto_model_id' => $model->id
                ]);

                $modification->date_start = !empty($arr['date_start']) ? $arr['date_start'] : null;
                $modification->date_end = !empty($arr['date_end']) ? $arr['date_end'] : null;
                $modification->description = $arr['description'];
                $modification->full_description = $arr['full_description'];

                if($modification->save() && $itemKey%150 == 1) {
                    echo "Modification. Last saved: ". $modification->id . " saved \n";
                }

            }
        });
    }

    public function parseAttrGroups() {
        /**
         * Attr_groups
         */

        $items = DB::connection('tecdoc')
            ->table('passanger_car_attributes')
            ->select('attributegroup')
            ->distinct('attributegroup')
            ->get();
//        dd($items);
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AttributeGroup::firstOrCreate(['name' => $arr['attributegroup']]);
            $model->save();

            echo "Attr ". $model->id . " saved \n";
        }

    }

    public function parseAttrTypes() {
        /**
         * Attr_types
         */

        $items = DB::connection('tecdoc')
            ->table('passanger_car_attributes')
            ->select('attributetype')
            ->distinct('attributetype')
            ->get();
//        dd($items);
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AttributeType::firstOrCreate(['name' => $arr['attributetype']]);
            $model->save();

            echo "Attr type ". $model->id . " saved \n";
        }
    }

    public function parseModificationAttributes() {
        $items = DB::connection('tecdoc')
            ->table('passanger_car_attributes')
            ->select('attributetype', 'attributegroup', 'passangercarid as auto_modification_id', 'displaytitle as name', 'displayvalue as value')
            ->get();

        $groups = AttributeGroup::all()->pluck('id', 'name');
        $types = AttributeType::all()->pluck('id', 'name');

        foreach ($items as $itemKey => $item) {
            $arr = (array)$item;
            $modification = AutoModification::where('tecdoc_id', $arr['auto_modification_id'])->first();
            if(empty($modification)) {
//                echo "Modification not found by tecdov_id ".$arr['auto_modification_id'] . "\n";
                continue;
            }

            $model = ModificationAttribute::firstOrCreate([
                'name' => $arr['name'],
                'value' => $arr['value'],
                'auto_modification_id' => $modification->id,//$arr['auto_modification_id'],
                'attribute_group_id' => $groups[$arr['attributegroup']],
                'attribute_type_id' => $types[$arr['attributetype']],
            ]);
            if($model->save() && $itemKey%150 == 1) {
                echo "Attr. Last ". $model->id . " saved \n";
            }

        }

    }

    public function parseEngines() {
        $items = DB::connection('tecdoc')
            ->table('engines')
            ->select('id as tecdoc_id', 'description as name', 'fulldescription as description')
            ->where(['isengine' => 'True'])
            ->get();
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AutoEngine::firstOrCreate($arr);
            $model->save();

            echo "Engine ". $model->id . " saved \n";
        }
    }

    public function parseEngineAttrGroups() {
        $items = DB::connection('tecdoc')
            ->table('engine_attributes')
            ->select('attributegroup')
            ->distinct('attributegroup')
            ->get();
//        dd($items);
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AutoEngineAttributeGroup::firstOrCreate(['name' => $arr['attributegroup']]);
            $model->save();

            echo "Attr ". $model->id . " saved \n";
        }
    }

    public function parseEngineAttrTypes() {
        $items = DB::connection('tecdoc')
            ->table('engine_attributes')
            ->select('attributetype')
            ->distinct('attributetype')
            ->get();
//        dd($items);
        foreach ($items as $item) {
            $arr = (array)$item;
            $model = AutoEngineAttributeType::firstOrCreate(['name' => $arr['attributetype']]);
            $model->save();

            echo "engine attr type ". $model->id . " saved \n";
        }
    }

    public function parseEngineAttributes(){
        $items = DB::connection('tecdoc')
            ->table('engine_attributes')
            ->select('attributetype', 'attributegroup', 'engineid as auto_engine_id', 'displaytitle as name', 'displayvalue as value')
            ->get();

        $groups = AutoEngineAttributeGroup::all()->pluck('id', 'name');
        $types = AutoEngineAttributeType::all()->pluck('id', 'name');

        foreach ($items as $item) {
            $arr = (array)$item;

            $engine = AutoEngine::where('tecdoc_id', $arr['auto_engine_id'])->first();
            if(empty($engine)) {
                echo "Engine not found by tecdov_id ".$arr['auto_engine_id'] . "\n";
                continue;
            }

            $model = AutoEngineAttribute::firstOrCreate([
                'name' => $arr['name'],
                'value' => $arr['value'],
                'auto_engine_id' => $engine ? $engine->id : null,
                'attribute_group_id' => $groups[$arr['attributegroup']],
                'attribute_type_id' => $types[$arr['attributetype']],
            ]);
            $model->save();

            echo "Engine Attr ". $model->id . " saved \n";
        }
    }

    public function parseEngineModificationRelations() {
        $items = DB::connection('tecdoc')
            ->table('passanger_car_engines')
            ->select('id', 'engineid')
            ->get();

        foreach ($items as $itemKey => $item) {
            $modification = AutoModification::where('tecdoc_id', $item->id)->first();
            $engine = AutoEngine::where('tecdoc_id', $item->engineid)->first();
            if(empty($modification)) {
                echo "Modification not found by tecdov_id ".$item->id . "\n";
                continue;
            }
            if(empty($engine)) {
                echo "Engine not found by tecdov_id ".$item->engineid . "\n";
                continue;
            }

            DB::table('auto_engine_auto_modification')->updateOrInsert([
                'auto_modification_id' => AutoModification::where('tecdoc_id', $item->id)->first()->id,
                'auto_engine_id' => AutoEngine::where('tecdoc_id', $item->engineid)->first()->id,
            ]);

            echo "yo! " . $itemKey . "\n";

        }

    }
}
