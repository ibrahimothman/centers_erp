<?php


Route::group([
    'prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => ['before' => 'jwt.auth']], function (){
    Route::apiResource('students', '\App\Http\Controllers\Api\V1\StudentApiController');
    Route::apiResource('tests', '\App\Http\Controllers\Api\V1\TestApiController');

});






