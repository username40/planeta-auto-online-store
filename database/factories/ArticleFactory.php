<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Article;
use Faker\Generator as Faker;


$factory->define(Article::class, function (Faker $faker) {
    return [
        'user_id' => App\User::inRandomOrder()->first()->id,
        'title' => $faker->name,
        'content' => $faker->realText(120),
        'created_at' => now(),
        'publicated_at' => now()->addDays(rand(1,3))
    ];
});
