<?php

use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $schedule = [
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
            [
                'start' => 9,
                'end' => 21,
            ],
        ];

        $pvz_data = [
            [
                'guid' => 'a13199f8-aa5c-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Артемовский',
            ],[
                'guid' => 'd7391d83-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Богданович',
            ],[
                'guid' => 'cc6415e6-a4e5-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Верхотурье',
            ],[
                'guid' => '232f384a-f93f-11e8-80c1-00259033a737',
                'is_pvz' => true,
                'name' => 'ИМ Колеса-Урал',
            ],[
                'guid' => 'd251aa8d-aa5c-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Комсомольская',
            ],[
                'guid' => '2eb4a6c3-aa5e-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Красноуральск',
            ],[
                'guid' => '26c067d5-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Походная',
            ],[
                'guid' => '22da1d8c-fb76-11e7-ab62-00505689dd5f',
                'is_pvz' => true,
                'name' => 'Ревда',
            ],[
                'guid' => '62bdce47-aa5e-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Селькоровская',
            ],[
                'guid' => 'f388bbb9-aa5c-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Сибирский тракт',
            ],[
                'guid' => '578d2755-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Уральская 140',
            ],[
                'guid' => '858d60ba-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'ШЦ Березовский',
            ],[
                'guid' => 'ad5b82df-1bd2-11e9-80c0-c709241d6d2b',
                'is_pvz' => false,
                'name' => 'Римэкс - диски',
            ],[
                'guid' => '11397bf3-2a55-11e7-80c4-3c4a92f7bc30',
                'is_pvz' => false,
                'name' => '4 точки Пауэр Интернэшнл-шины',
            ],[
                'guid' => '043f1dff-3f8a-11e7-80c5-3c4a92f7bc30',
                'is_pvz' => false,
                'name' => 'Римэкс - шины(основной)',
            ],[
                'guid' => '31842b9d-5184-11e7-80c5-3c4a92f7bc30',
                'is_pvz' => false,
                'name' => 'Планета Авто',
            ],[
                'guid' => '09c087b0-5267-11e7-80c5-3c4a92f7bc30',
                'is_pvz' => false,
                'name' => 'ООО "Север Авто Пермь"',
            ]
        ];

        foreach ($pvz_data as $pvz) {

            $data = [
                'schedule' => json_encode($schedule),
                'address' => $pvz['name'],
                'type' => 'market',
                'city_id' => \App\Models\City::first()->id

            ];
            unset($pvz['is_pvz']);
            unset($pvz['name']);

            $pvz = array_merge($pvz, $data);
            $department = \App\Models\Department::create($pvz);
            $department->images()->saveMany([
                \App\Models\Image::create([
                    'path' => 'https://www.planetavto.ru/sites_files/market_service/srvavt_0.01678500%201562851940.jpg'
                ]),
                \App\Models\Image::create([
                    'path' => 'https://www.planetavto.ru/sites_files/market_service/srvavt_0.56682900%201562851972.jpg'
                ]),
                \App\Models\Image::create([
                    'path' => 'https://www.planetavto.ru/sites_files/market_service/srvavt_0.18766100%201562852013.jpg'
                ]),
            ]);

        }
    }
}
