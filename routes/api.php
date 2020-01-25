<?php


Route::group([
    'prefix' => 'auth'], function () {

    Route::post('login', 'AuthController@login');
    Route::post('logout', 'AuthController@logout');
    Route::post('refresh', 'AuthController@refresh');
    Route::post('me', 'AuthController@me');

});

Route::group(['middleware' => ['before' => 'jwt.auth']], function (){
    Route::apiResource('students', '\App\Http\Controllers\Api\StudentApiController');
    Route::apiResource('tests', '\App\Http\Controllers\Api\TestApiController');
    Route::apiResource('test-groups', '\App\Http\Controllers\Api\TestGroupApiController');

});






