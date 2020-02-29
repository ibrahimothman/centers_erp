<?php


use Illuminate\Support\Facades\Route;

Route::group([
    'prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::post('register', '\App\Http\Controllers\Api\RegisterController@register');

Route::group(['middleware' => ['before' => 'jwt.auth']], function (){
    Route::apiResource('students', '\App\Http\Controllers\Api\StudentApiController');

    Route::apiResource('tests', '\App\Http\Controllers\Api\TestApiController');
    Route::apiResource('test-groups', '\App\Http\Controllers\Api\TestGroupApiController');
    Route::apiResource('test-enrollments', '\App\Http\Controllers\Api\TestEnrollmentApiController');
    Route::DELETE('cancel-test-enrollment', '\App\Http\Controllers\Api\TestEnrollmentApiController@cancelEnrollment');

});
    Route::apiResource('course_groups', '\App\Http\Controllers\Api\CourseGroupController');
    Route::apiResource('course_enrollments', '\App\Http\Controllers\Api\CourseEnrollmentController');

Route::get('search_student_by_name','StudentController@searchByName');
Route::resource('courses','CoursesApi');
Route::resource('instructors','InstructorApiController');
Route::resource('categories','CategoriesApiController');
Route::resource('reviews','ReviewsApiController');






