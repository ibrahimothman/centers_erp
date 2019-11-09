<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Center;
use App\Test;
use Faker\Generator as Faker;

$factory->define(Test::class, function (Faker $faker) {
    return [
        'center_id' => factory(Center::class)->create(),
        'name' => $faker->unique()->title,
        'description' => 'test description',
        'cost_ind' => 1000,
        'cost_course' => 500,
        'retake' => 1,
    ];
});
