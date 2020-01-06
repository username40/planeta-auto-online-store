<?php

namespace App\Console\Commands;

use App\Models\AutoMark;
use App\Models\AutoModification;
use Carbon\Carbon;
use Doctrine\DBAL\Query\QueryBuilder;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Orchestra\Parser\Xml\Facade as XmlParserLib;


class XMLParser extends Command
{
    const DELIMITER = ';';
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'xml:parser';

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
//        $file_source = Storage::path('public/uploads/auto_short.xml');
        $file_source = Storage::path('public/uploads/auto.xml');
        $xml = file_get_contents($file_source);
        $xml = simplexml_load_string($xml);
        $json = json_encode($xml, JSON_UNESCAPED_UNICODE);
        $array = json_decode($json,TRUE);

//        $item = $array['item'][100];

        // todo: refack
        file_put_contents("xml_parse_not_found.log", "");
        file_put_contents("xml_parse.log", "");
        file_put_contents('xml_parse_not_found.csv', "Marka".self::DELIMITER. "Model".self::DELIMITER. "Kuzov".self::DELIMITER. "Year_from".self::DELIMITER. "Year_to".self::DELIMITER. "Modification".self::DELIMITER. "Car_id".self::DELIMITER. "TecDoc_ID \n");

//        $this->find($arr);
        $i = 0;


        // todo: delete
//        $array['item'] = array_slice($array['item'], 0, 100);


//        DB::table('modification_product')->delete();

        foreach ($array['item'] as $item) {
            $arr = [];
            $arr["carid"] = $item['carid'];
            $arr["marka"] = $item['marka'];
            $arr["model"] = $item['model'];
            $arr["kuzov"] = $item['kuzov'];
            $arr["modification"] = $item['modification'];
            $arr["beginyear"] = $item['beginyear'];
            $arr["endyear"] = $item['endyear'];

            if ($this->find($arr) == true) {
                $i++;
            };
        }
        echo ($i)*100/(count($array['item'])) . "%";
//        dd($array);
    }

    public function find(array $arr) {


        $markAliases = [
            'УАЗ' => 'UAZ',
            'ЗАЗ' => 'ZAZ',
            'MERCEDES' => 'MERCEDES-BENZ',
            'VOLKSWAGEN' => 'VW',
        ];
        $markName = str_replace(array_keys($markAliases), $markAliases, $arr['marka']);
        $mark = AutoMark::where('name', $markName)->first();

//        echo "Марка: $markName \n";



        if ($mark) {
            /**
             * @var \App\Models\AutoMark $mark
             */
            $beginyear = (int) $arr['beginyear'];
            $beginyear_m1 = (int) $arr['beginyear'] - 1;
            $beginyear_p1 = (int) $arr['beginyear'] + 1;

//            $firstModelWord = explode(' ', $arr['model'])[0];

            $modelAliases = [
                '4х4 Нива' => 'NIVA',
                'L200' => 'L 200',
                '4runner' => '4 RUNNER',
                'CLS-Klasse' => 'CLS',
                'GLE-Klasse' => 'GLE',
                'SLR-Klasse' => 'SLR',
                'Klasse' => 'Class',
                'sedan' => 'седан',
                'Hatch ' => 'Наклонная задняя часть ',
                'Cabrio' => 'кабриолет',
                'T-Modell' => 'T-Model',
                '-series' => '',
            ];

            $modelFullName = trim(str_replace(array_keys($modelAliases), $modelAliases, $arr['model'].' '.$arr['kuzov']));


            $firstModelArr = explode(' ', $modelFullName);
            $modelWord = isset($firstModelArr[0]) ? $firstModelArr[0] : null;
            $modelWord2 = isset($firstModelArr[1]) ? $firstModelArr[1] : null;

            $modelQuery = $mark->models()
                ->select()
                ->addSelect(DB::raw("MATCH(`description`) AGAINST('{$modelFullName}' IN BOOLEAN MODE) AS score"))
                ->addSelect(DB::raw("ABS(YEAR(date_start) - {$beginyear}.0) AS year_distance"));


            if($modelWord2) {
                $modelQuery->whereRaw("(description like '%{$modelWord}%' OR description like '%{$modelWord2}%')");
            } else {
                $modelQuery->where("description", "like", "%{$modelWord}%");
            }

            $modelQuery->orderByDesc('score')->orderBy('year_distance');


            $firstModel = $modelQuery->first();

            /**
             * @var \App\Models\AutoModel $firstModel
             */
            if($firstModel) {
                $firstModificationArr = explode(' ', $arr['modification']);
                $modificationWord = isset($firstModificationArr[0]) ? $firstModificationArr[0] : null;
                $modificationWordWdot = str_replace('.', '', $modificationWord);

                $modificationQuery = $firstModel->modifications()
                    ->select()
                    ->addSelect(DB::raw("MATCH(`description`) AGAINST('{$arr['modification']}' IN NATURAL LANGUAGE MODE) AS score"))
                    ->addSelect(DB::raw("ABS(YEAR(date_start)   - {$arr['beginyear']}.0) AS year_distance"));

                $modificationQuery->whereRaw("(description LIKE '%{$modificationWord}%' OR description LIKE '{$modificationWordWdot}%' OR REPLACE(description, ' ', '') LIKE '$modificationWord%')");
                $modificationQuery->orderByDesc('score')->orderBy('year_distance');
                $firstModification = $modificationQuery->first();

//                $firstModification->prod

                /**
                 * @var $firstModification AutoModification
                 */
                if(!$firstModification) {
//                    echo "НЕ Нашли: {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']}  \n";
//                    file_put_contents('xml_parse_not_found.log', "ModificationNotFound! XML {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']} \n", FILE_APPEND);
//                    Log::info("ModificationNotFound! XML {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']} ");
                    return false;
                } else {
                    echo "Нашли: {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']}  \n";

//                    Log::info("XML {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']} --- {$firstModification->full_description} ");

//                    $firstModification->xml_auto_id = $arr['carid'];
                    $firstModification->update(['xml_auto_id' => $arr['carid']]);



                    // todo: связать модификацию с товаром по характеристикуам (width,height,diameter)



//                    $firstModification->products()->save($firstModel);



//                    file_put_contents('xml_parse_not_found.csv', iconv( "utf-8", "windows-1251", "{$arr['marka']}"
//                        .self::DELIMITER. str_replace(';', '', $arr['model'])
//                        .self::DELIMITER. "{$arr['kuzov']}"
//                        .self::DELIMITER. "{$arr['beginyear']}"
//                        .self::DELIMITER. "{$arr['endyear']}"
//                        .self::DELIMITER. "\" {$arr['modification']}\" "
//                        .self::DELIMITER. "{$arr['carid']}"
//                        .self::DELIMITER. "  \n"), FILE_APPEND);
                    return true;
                }
            } else {
                Log::info("ModelNotFound! XML {$arr['marka']} {$arr['model']} {$arr['kuzov']} ({$arr['beginyear']} - {$arr['endyear']}) {$arr['modification']} ");
                file_put_contents('xml_parse_not_found.csv', iconv( "utf-8", "windows-1251", "{$arr['marka']}".self::DELIMITER. str_replace(';', '', $arr['model']) .self::DELIMITER. "{$arr['kuzov']}".self::DELIMITER. "{$arr['beginyear']}".self::DELIMITER. "{$arr['endyear']}".self::DELIMITER. "\" {$arr['modification']}\" ".self::DELIMITER. "{$arr['carid']}".self::DELIMITER. "  \n"), FILE_APPEND);
                return false;
            }
//            echo  "\n\n\n";
        }

        return false;


//
    }
}
