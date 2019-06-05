<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Employee;
use Faker\Generator as Faker;

$factory->define(Employee::class, function (Faker $faker) {
    return [
        //
        'date_of_birth' => $faker->date(),
        'position' => $faker->text(75),
        'user_id' => \App\User::all()->random()->id,
        'hotel_id' => \App\Hotel::all()->random()->id,
    ];
});
