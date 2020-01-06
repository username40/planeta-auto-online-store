<?php

namespace App\Console\Commands;
use App\Models\Category;
use \App\Models\Prefilter as PrefilterModel;
use App\Models\AutoMark;
use App\Models\AutoModification;
use App\Models\Property;
use App\Models\PropertyValue;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParserLib;


class Prefilter extends Command
{
    const DELIMITER = ';';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:prefilter';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Tyres & disks parser from xml';

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
        PrefilterModel::getQuery()->truncate();
        echo "PrefilterModel was cleaned \n";
//        $file_source = Storage::path('public/uploads/auto_short.xml');
        $file_source = Storage::path('public/uploads/auto.xml');
        $xml = file_get_contents($file_source);
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml, JSON_UNESCAPED_UNICODE);
        $array = json_decode($json,TRUE);

        $i = 0;

        foreach ($array['item'] as $item) {
            $arr = $item;
            if(!empty($arr['diski']['beforewheels']['diskid'])) {
                $beforewheels[] = $arr['diski']['beforewheels'];
            } else {
//                var_dump($arr);die;
                $beforewheels = $arr['diski']['beforewheels'];
            }
//            var_dump($beforewheels);
            if ($this->findByCarId($arr['carid'], $beforewheels) == true) {
                $i++;
            };
        }
        echo ($i)*100/(count($array['item'])) . "% \n";
        echo "Total xml count: ".count($array['item']);
    }

    public function findByCarId($carId, $disks) {

        $modification = AutoModification::where(['xml_auto_id' => (int)$carId])->first();
        if($modification) {
            $tirePropertyMap = [
                'width' => Property::ID_TIRE_WIDTH,
                'height' => Property::ID_TIRE_HEIGHT,
                'diameter' => Property::ID_TIRE_DIAMETER,
            ];

            foreach ($disks as $xmlDisk) {
                $xmlTires = [];
                if(!empty($xmlDisk['tyres']['width'])) {
                    $xmlTires[] = $xmlDisk['tyres'];
                } else {
                    $xmlTires = $xmlDisk['tyres'];
                }

                foreach ($xmlTires as $xmlTire) {
                    foreach ($xmlTire as $xmlTireKey => $xmlTireParam) {
                        if(!isset($tirePropertyMap[$xmlTireKey])) {
                            continue;
                        }
                        $xmlTireParam = str_replace('.0', '', $xmlTireParam);
                        $propertyValue = PropertyValue::where(['property_id' => $tirePropertyMap[$xmlTireKey], 'value' => $xmlTireParam])->first();
                        if($propertyValue) {
                            $prefilter = new PrefilterModel();
                            $prefilter->category_id = Category::ID_TIRE;
                            $prefilter->property_id = $tirePropertyMap[$xmlTireKey];
                            $prefilter->property_value_id = $propertyValue->id;
                            $prefilter->auto_modification_id = $modification->id;
                            $modification->prefilter()->save($prefilter);
                        } else {
                            var_dump($xmlTire);
                        }
                    }
                }
            }
        }

        return false;


//
    }
}
