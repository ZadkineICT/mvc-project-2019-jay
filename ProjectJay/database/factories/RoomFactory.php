<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        //
        'room_size' => $faker->numberBetween(1,6),
        'hotel_id' => \App\Hotel::all()->random()->id,
        'roomtype_id' => \App\Roomtype::all()->random()->id,
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
