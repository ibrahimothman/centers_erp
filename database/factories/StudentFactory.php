<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'nameAr' => $faker->name,
        'nameEn' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'phoneNumber' => '010'.$faker->randomNumber(8),
        'idNumber' => randomNumber(14),
        'phoneNumberSec' => '01234567896',
        //'skillCardNumber' => '123',
//        'state' => 'Egypt',
//        'city' => 'cairo',
//        'address' => '15 building',
//        'degree' => 'students',
//        'faculty' => 'engineering',
    ];
});

function randomNumber($length) {
    $result = '';

    for($i = 0; $i < $length; $i++) {
        $result .= mt_rand(0, 9);
    }

    return $result;
}
