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


//use Illuminate\Routing\Route;
use Illuminate\Support\Facades\Route;

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


//Route::resource('courses','CoursesController');
//Route::resource('Student','StudentController');
//Route::resource('test','TestController');
//Route::get('gettest','TestController@getTests');
//Route::resource('StudentTest', 'StudentTestController',
//    array('except' => array('create')));
//
//Route::resource('groups','GroupController');
//Route::resource('groupStudents','GroupStudentsController');
//Route::get('studentAutocomplete', 'GroupStudentsController@search');
//Route::get('test/{id}/enrollment','TestController@getStudents');
//Route::get('students/{id}/enrollment','StudentController@getEnrolledGroups');
//Route::delete('students/{student_id}/test/{tets_id}/unenrollment','StudentTestController@unEnroll');
//Route::resource('test_group','TestGroupController');
//Route::get('test_group/{id}/closeExam','TestGroupController@closeExam');
//Route::get('test/{test_name}/groups','TestGroupController@getTestGroups');
//
//// students test group
//Route::resource('test_enrollment','TestEnrollmentController');
//Route::get('/add_to_test/{test_id}','TestEnrollmentController@addStudentToGroup');
//Route::resource('test_take','TestTakeController');
//Route::get('/students/{id?}/tests','TestEnrollmentController@create');
//Route::get('test_stu_enroll','TestEnrollmentController@getTestEnrollments');
//Route::get('/students/{sid}/test/{tid}/groups','TestEnrollmentController@showTestGroups');
//
//Route::post('students/{sid}/enroll/{gid}','TestEnrollmentController@store');
//Route::get(' ','TestTreeController@index');
//Route::get('/fill_parent','TestTreeController@fillParent');
//Route::post('/add_test','TestTreeController@add');
//Route::get('/view_tree','TestTreeController@fetchTree');
//
//
//Route::resource('testTakes','TestTakeController');
//Route::post('/test_take/confirmTestAttendance','TestTakeController@confirmTestAttendance');
//Route::get('/add_test_time','TestController@testTime');
//Route::get('/Student/all','StudentController@viewAll');
//Route::post('/test_groups/getTestGroups','TestGroupController@getTestGroupsData');
//
//Route::resource('test_result','TestResultController');

//Route::get('group_students','TestResultController@getTestGroupStudents');
//Route::get('get_tests','TestController@getTests');
//Route::get('check_test','TestController@checkTest');
//Route::get('search_tests','TestController@searchTest');
//Route::get('check_stu_test','TestEnrollmentController@checkEnrollmentTest');
//Route::get('check_stu_time','TestEnrollmentController@checkEnrollmentTime');



Auth::routes();

