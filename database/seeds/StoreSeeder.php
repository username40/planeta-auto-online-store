<?php

use Illuminate\Database\Seeder;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        #clean table stores before seeding
//        \App\Models\OrderItem::truncate();
//        \App\Models\Order::truncate();
//        \App\Models\Store::truncate();

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
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],
                    ['day' => 1, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],
                    ['day' => 3, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],
                    ['day' => 5, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => 'd7391d83-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Богданович',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],
                    ['day' => 1, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],
                    ['day' => 2, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],
                    ['day' => 3, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],
                    ['day' => 4, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],
                    ['day' => 5, 'hour' => 14, 'type' => 'delivery'],
                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => 'cc6415e6-a4e5-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Верхотурье',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 14, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],
                    ['day' => 1, 'hour' => 20, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],
                    ['day' => 3, 'hour' => 20, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],
                    ['day' => 5, 'hour' => 20, 'type' => 'delivery'],
                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => 'd251aa8d-aa5c-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Комсомольская',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 17, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 17, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 17, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 17, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 17, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '2eb4a6c3-aa5e-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Красноуральск',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 14, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],
                    ['day' => 1, 'hour' => 20, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],
                    ['day' => 3, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],
                    ['day' => 4, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],
                    ['day' => 5, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '26c067d5-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Походная',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '22da1d8c-fb76-11e7-ab62-00505689dd5f',
                'is_pvz' => true,
                'name' => 'Ревда',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '62bdce47-aa5e-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Селькоровская',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => 'f388bbb9-aa5c-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Сибирский тракт',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 12, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 19, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '578d2755-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'Уральская 140',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 10, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 15, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 9, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
                'guid' => '858d60ba-aa5d-11e7-a2f0-005056984af5',
                'is_pvz' => true,
                'name' => 'ШЦ Березовский',
                'delivery_schedule' => [
                    ['day' => 0, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 11, 'type' => 'request'],
                    ['day' => 0, 'hour' => 16, 'type' => 'delivery'],
                    ['day' => 0, 'hour' => 17, 'type' => 'request'],

                    ['day' => 1, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 11, 'type' => 'request'],
                    ['day' => 1, 'hour' => 16, 'type' => 'delivery'],
                    ['day' => 1, 'hour' => 17, 'type' => 'request'],

                    ['day' => 2, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 11, 'type' => 'request'],
                    ['day' => 2, 'hour' => 16, 'type' => 'delivery'],
                    ['day' => 2, 'hour' => 17, 'type' => 'request'],

                    ['day' => 3, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 11, 'type' => 'request'],
                    ['day' => 3, 'hour' => 16, 'type' => 'delivery'],
                    ['day' => 3, 'hour' => 17, 'type' => 'request'],

                    ['day' => 4, 'hour' => 11, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 11, 'type' => 'request'],
                    ['day' => 4, 'hour' => 16, 'type' => 'delivery'],
                    ['day' => 4, 'hour' => 17, 'type' => 'request'],

                    ['day' => 5, 'hour' => 11, 'type' => 'delivery'],

                    ['day' => 6, 'hour' => 16, 'type' => 'request'],
                ]
            ],[
            'guid' => 'ad5b82df-1bd2-11e9-80c0-c709241d6d2b',
            'is_pvz' => false,
            'name' => 'Римэкс - диски',
            'delivery_schedule' => []
            ],[
            'guid' => '11397bf3-2a55-11e7-80c4-3c4a92f7bc30',
            'is_pvz' => false,
            'name' => '4 точки Пауэр Интернэшнл-шины',
            'delivery_schedule' => []
            ],[
            'guid' => '043f1dff-3f8a-11e7-80c5-3c4a92f7bc30',
            'is_pvz' => false,
            'name' => 'Римэкс - шины(основной)',
            'delivery_schedule' => []
            ],[
            'guid' => '31842b9d-5184-11e7-80c5-3c4a92f7bc30',
            'is_pvz' => false,
            'name' => 'Планета Авто',
            'delivery_schedule' => []
            ],[
            'guid' => '09c087b0-5267-11e7-80c5-3c4a92f7bc30',
            'is_pvz' => false,
            'name' => 'ООО "Север Авто Пермь"',
            'delivery_schedule' => []
            ]
        ];

        foreach ($pvz_data as $pvz) {
            $pvz['schedule'] = $schedule;
//            $pvz['delivery_schedule'] = json_encode($pvz['delivery_schedule']);
            \App\Models\Store::create($pvz);
        }


    }
}
