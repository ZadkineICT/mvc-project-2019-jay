<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Review;
use Faker\Generator as Faker;

$factory->define(Review::class, function (Faker $faker) {
    return [
        //
        'date' => $faker->dateTimeThisDecade('now', null),
        'message' => $faker->paragraph(4),
        'stars' => $faker->numberBetween(1, 5),
        'hotel_id' => \App\Hotel::all()->random()->id,
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
