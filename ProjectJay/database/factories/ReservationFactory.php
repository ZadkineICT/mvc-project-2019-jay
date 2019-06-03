<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Reservation;
use Faker\Generator as Faker;

$factory->define(Reservation::class, function (Faker $faker) {
    return [
        //
        'start' => $faker->date(),
        'end' => $faker->date(),
        'price' => $faker->randomFloat(2,1,99),
        'number_of_persons' => $faker->numberBetween(1,6),
        'user_id' => \App\User::all()->random()->id,
        'room_id' => \App\Room::all()->random()->id,
        'hotel_id' => \App\Hotel::all()->random()->id,
    ];
});
