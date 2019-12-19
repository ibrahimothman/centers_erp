<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $roles = ['student.add','student.edit','student.delete','student.view','test.add','test.edit','test.delete','test.view'];
    return [
        'name' => $roles[array_rand($roles)]
    ];
});
