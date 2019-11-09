<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\TestGroup;
use Faker\Generator as Faker;

$factory->define(TestGroup::class, function (Faker $faker) {
    return [
        'test_id' => factory(\App\Test::class)->create(),
        'group_date' => $faker->dateTime,
        'available_chairs' => 10,
    ];
});
