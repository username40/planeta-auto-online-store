<?php

use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
//        \App\Models\Product::truncate();
        factory(App\Models\Product::class, 50)
            ->create();
    }
}
