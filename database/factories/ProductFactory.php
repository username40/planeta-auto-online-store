<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'article' => strval($faker->numberBetween(10000,99999)),
        'code' => strval($faker->numberBetween(10000,99999)),
    ];
});
