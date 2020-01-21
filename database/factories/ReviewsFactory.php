<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\CourseReview::class, function (Faker $faker) {
    return [
        'rating'=>$faker->numberBetween(1,5),
        'review_body'=>$faker->sentence,
        'course_id'=>$faker->numberBetween(1,3),
        'student_id'=>$faker->numberBetween(1,9)

    ];
});
