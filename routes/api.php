<?php


use Illuminate\Support\Facades\Route;
$api_controller_path = "\App\Http\Controllers\Api";
Route::group([
    'prefix' => 'auth'], function () use ($api_controller_path){

    Route::post('login', "$api_controller_path\AuthController@login");
    Route::post('logout', "$api_controller_path\AuthController@logout");
    Route::post('refresh', "$api_controller_path\AuthController@refresh");
    Route::post('me', "$api_controller_path\AuthController@me");

});

Route::post('register', "$api_controller_path\RegisterController@register");

Route::group(['middleware' => ['before' => 'jwt.auth']], function () use ($api_controller_path){
    Route::apiResource('students', "$api_controller_path\StudentApiController");

    Route::apiResource('tests', "$api_controller_path\TestApiController");
    Route::apiResource('test-groups', "$api_controller_path\TestGroupApiController");
    Route::apiResource('test-enrollments', "$api_controller_path\TestEnrollmentApiController");
    Route::DELETE('cancel-test-enrollment', "$api_controller_path\TestEnrollmentApiController@cancelEnrollment");

    Route::apiResource('course_enrollments', "$api_controller_path\CourseEnrollmentController");
});
Route::apiResource('course_groups', "$api_controller_path\CourseGroupController");

Route::get('search_student_by_name','StudentController@searchByName');
Route::resource('courses',"$api_controller_path\CoursesApi");
Route::resource('instructors',"$api_controller_path\InstructorApiController");
Route::resource('categories',"$api_controller_path\CategoriesApiController");
Route::resource('reviews',"$api_controller_path\ReviewsApiController");






