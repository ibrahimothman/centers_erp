<?php

use App\Center;
use App\Course;
use App\Http\Resources\Student as StudentResource;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('search_student_by_name','StudentController@searchByName');

Route::get('/students', function () {
    $center = Auth::user()->center;
    return StudentResource::collection($center->students);
});


