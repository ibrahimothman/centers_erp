<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Category::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'description'=>$faker->sentence,
        'parent_id'=>$faker->randomElement([0,1,2,3,4,5,6,7,8,9]),
        'image'=>'https://source.unsplash.com/random'

    ];
});
