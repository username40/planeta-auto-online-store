<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;
use \Illuminate\Support\Facades\DB;
use \App\Models\Region;
use \App\Models\City;

/**
 * Файл городов и регионов взяты с https://sypexgeo.net/ru/download/
 * Class CitySeeder
 */
class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->loadRegions();
        $this->loadCities();
    }

    protected function loadRegions() {
        try {
            $regionPath = storage_path('app/geo/region.tsv');
            if(!file_exists($regionPath)) {
                throw new Exception("File $regionPath not found");
            }

            $delimiter = "\t";

            $fp = fopen($regionPath, 'r');
            $regionSavedCount = 0;
            while ( !feof($fp) )
            {
                $line = fgets($fp, 2048);

                $data = str_getcsv($line, $delimiter);
                $setAttributes = [];
                $setAttributes['id'] = !empty($data[0]) ? $data[0] : null;
                $setAttributes['iso'] = !empty($data[1]) ? $data[1] : null;
                $setAttributes['country'] = !empty($data[2]) ? $data[2] : null;
                $setAttributes['name_ru'] = !empty($data[3]) ? $data[3] : null;
                $setAttributes['name_en'] = !empty($data[4]) ? $data[4] : null;
                $setAttributes['timezone'] = !empty($data[5]) ? $data[5] : null;

                if($setAttributes['country'] !== 'RU') { // Берем только из России
                    continue;
                }
                echo $setAttributes['country']."\n";


                if(!$setAttributes['id'] or !$setAttributes['name_ru']) {
                    throw new Exception('Empty fields: '.var_export($data));
                }

                $region = Region::find($setAttributes['id']);
                if(empty($region)) {
                    $region = new Region();
                }
                $region->setRawAttributes($setAttributes);
                if($region->save()) {
                    $regionSavedCount++;
                }
            }

            echo "Region count: $regionSavedCount \n";

            if(!empty($fp)) {
                fclose($fp);
            }

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }
    }


    protected function loadCities() {
        try {
            $cityPath = storage_path('app/geo/city.tsv');
            if(!file_exists($cityPath)) {
                throw new Exception("File $cityPath not found");
            }
            $delimiter = "\t";
            $fp = fopen($cityPath, 'r');
            $citySavedCount = 0;

            while ( !feof($fp) )
            {
                $line = fgets($fp, 2048);
                $data = str_getcsv($line, $delimiter);
                $setAttributes = [];
                $setAttributes['id'] = !empty($data[0]) ? $data[0] : null;
                $setAttributes['region_id'] = !empty($data[1]) ? $data[1] : null;
                $setAttributes['name_ru'] = !empty($data[2]) ? $data[2] : null;
                $setAttributes['name_en'] = !empty($data[3]) ? $data[3] : null;
                $setAttributes['lat'] = !empty($data[4]) ? $data[4] : null;
                $setAttributes['lon'] = !empty($data[5]) ? $data[5] : null;

                if(empty($setAttributes['region_id']) or !DB::table('regions')->where(['id' => $setAttributes['region_id']])->count()) {
                    continue;
                }

                if(!$setAttributes['id'] or !$setAttributes['name_ru']) {
                    throw new Exception('Empty fields: '.var_export($data));
                }

                $region = City::find($setAttributes['id']);
                if(empty($region)) {
                    $region = new City();
                }
                $region->setRawAttributes($setAttributes);
                if($region->save()) {
                    $citySavedCount++;
                }
            }
            echo "City count: $citySavedCount \n";

        } catch (Exception $e) {
            var_dump($e->getMessage());
        }

        fclose($fp);
    }
}
