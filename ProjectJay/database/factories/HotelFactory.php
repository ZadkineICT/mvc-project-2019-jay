<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Hotel;
use Faker\Generator as Faker;

$factory->define(Hotel::class, function (Faker $faker) {
    return [
        //
        'address' => $faker->streetAddress,
        'zip_code' => $faker->postcode,
        'city' => $faker->city,
        'country' => $faker->country,
        'phone_number' => $faker->tollFreePhoneNumber,
        'created_at' => $faker->dateTimeThisDecade('now', null),
        'updated_at' => $faker->dateTimeThisDecade('now', null)
    ];
});
