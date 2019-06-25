<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Favorite;
use Faker\Generator as Faker;

$factory->define(Favorite::class, function (Faker $faker) {
    return [
        //
        'hotel_id' => \App\Hotel::all()->random()->id,
        'user_id' => \App\User::all()->random()->id,
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
