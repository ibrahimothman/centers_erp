<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Instructor;
use Faker\Generator as Faker;

$factory->define(Instructor::class, function (Faker $faker) {
    return [
        'nameAr' => $faker->name,
        'nameEn' => $faker->name,
        'email' => $faker->email,
        'phoneNumber' => $faker->phoneNumber,
        'idNumber' => $faker->phoneNumber,
    ];
});
