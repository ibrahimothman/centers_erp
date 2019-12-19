<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Role;
use Faker\Generator as Faker;

$factory->define(Role::class, function (Faker $faker) {
    $roles = ['student.add','student.edit','student.delete','student.view',
                'test.add','test.edit','test.delete','test.view',
                'test-group.add','test-group.edit','test-group.delete','test-group.view',
                'test-enrollment.add','test-enrollment.edit','test-enrollment.delete','test-enrollment.view',
    ];
    return [
        'name' => $roles[array_rand($roles)]
    ];
});
