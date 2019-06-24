<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Roomtype;
use Faker\Generator as Faker;

$factory->define(Roomtype::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->name,
        'price' => $faker->numberBetween($min = 100, $max = 1200)
    ];
});
