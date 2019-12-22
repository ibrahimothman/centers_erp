<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


use App\Role;
use Illuminate\Support\Facades\Route;

//------------------------ center -------------
Route::resource('centers','CentersController');

// --------------------- students --------------------
Route::get('/', 'StudentController@create' );
Route::resource('students','StudentController');

Route::get('students.table','StudentController@showTable')->name('students.table');
Route::get('/search_student_by_name','StudentController@searchByName');
Route::get('students/image','Student@profileImage');


//---------------------- Tests-------------------
Route::resource('tests','TestController');

//--------------------- Test Groups -------------------------
Route::resource('test-groups','TestGroupController');
Route::get('/get_test_groups','TestGroupController@getTestGroups');
Route::post('/close_group','TestGroupController@closeGroup');

//----------------------- Test Enrollment---------------
Route::resource('test-enrollments','TestEnrollmentController');
Route::get('get_tests_enrollments','TestEnrollmentController@getTestEnrollments');
Route::delete('delete-test-enrollments','TestEnrollmentController@deleteEnrollment');

//----------------------- test takes ------------
Route::resource('test-takes','TestTakeController');

//----------------------- test results ------------
Route::resource('test-results','TestResultController');

//----------------------- statement ------------
Route::resource('test-statements','TestStatementController');
Route::get('test-statements-preview/{statement}/{student}','TestStatementController@previewStatement');

//-------------settings -----
Route::get('settings/profile','settingsController@showProfileSettings');
Route::post('settings/profile/update','settingsController@updateProfileSettings');

//----------- courses ---------------
Route::resource('courses','CoursesController');
Route::resource('course_groups','CourseGroupsController');
Route::resource('rooms','RoomsController');

Route::get('set_role',function (){
    $roles = ['student.add','student.edit','student.delete','student.view',
        'test.add','test.edit','test.delete','test.view',
        'test-group.add','test-group.edit','test-group.delete','test-group.view',
        'test-enrollment.add','test-enrollment.edit','test-enrollment.delete','test-enrollment.view',
    ];
    foreach ($roles as $role) {
        Role::create(['name' => $role]);
    }
});

Auth::routes();

