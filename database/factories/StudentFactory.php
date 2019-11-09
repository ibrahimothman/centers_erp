<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'nameAr' => 'عربي',
        'nameEn' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phoneNumber' => '01234567896',
        'idNumber' => '12345678965412',
        'phoneNumberSec' => '01234567896',
        'skillCardNumber' => '123',
        'state' => 'Egypt',
        'city' => 'cairo',
        'address' => '15 building',
        'degree' => 'students',
        'faculty' => 'engineering',
    ];
});
