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

//--------------------------- employees ------------------
Route::resource('employees','EmployeeController');

// --------------------- students --------------------
Route::get('/', 'HomeController@index' );
Route::resource('students','StudentController');

Route::get('students.table','StudentController@showTable')->name('students.table');
Route::get('/search_student_by_name','StudentController@searchByName');
//Route::get('students/image','Student@profileImage');


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



//----------- courses ---------------
Route::resource('courses','CoursesController');
Route::resource('course_groups','CourseGroupController');
Route::get('/get_course_groups','CourseGroupController@getCourseGroups');
Route::resource('course_enrollment','CourseEnrollmentController');
Route::get('get_course_enrollments','CourseEnrollmentController@getCourseEnrollments');
Route::resource('rooms','RoomsController');


// -------------------instructor----------------
Route::resource('instructor','InstructorsController');
//-------------------- jobs ---------------------
Route::resource('jobs','jobController');
//-------------------- settings ---------------------
Route::get('settings/instructorSettings','settingsController@instructorSettings');
Route::get('settings/instructorPassReset','settingsController@instructorPassReset');

Route::get('set_role',function (){
    $roles = ['student.add','student.view','student.update','student.delete',
        'test.add','test.view','test.update','test.delete',
        'test-group.add','test-group.view','test-group.update','test-group.delete',
        'test-enrollment.add','test-enrollment.view','test-enrollment.update','test-enrollment.delete',
    ];
    foreach ($roles as $role) {
        Role::create(['name' => $role]);
    }
});

Auth::routes(['register' => true]);
Route::get('/1', function () {
    return view('diploma.diploma_create');
});
Route::get('/2', function () {
    return view('diploma.diploma_view_all');
});
Route::get('/3', function () {
    return view('diploma.diploma_register');
});
Route::get('/4', function () {
    return view('diploma.diploma_update');
});
Route::get('/5', function () {
    return view('diploma.diploma_details');
});
Route::get('/6', function () {
    return view('diploma.diploma_student_register');
});
Route::get('/7', function () {
    return view('diploma.diploma_student_show');
});
Route::get('/8', function () {
    return view('diploma.diploma_update_register');
});