<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;

$factory->define(Room::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'location' => 'location',
        'details' => '{"area":"12","no_of_chairs":"20","no_of_computers":"2"}',

    ];
});
