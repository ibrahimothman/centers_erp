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


use App\Http\Resources\CourseGroup;
use App\Http\Resources\TestGroup as TestGroupResource;
use App\Instructor;
use App\Role;
use App\Room;
use App\TestGroup;
use App\Utility;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use function foo\func;

//------------------------ center -------------
Route::resource('centers','CentersController');

//--------------------------- employees ------------------
Route::resource('employees','EmployeeController');

// --------------------- students --------------------
Route::get('/', 'StudentController@create' );
Route::resource('students','StudentController');

Route::get('students.table','StudentController@showTable')->name('students.table');
Route::get('/search_student_by_name','StudentController@searchByName');
//Route::get('students/image','Student@profileImage');


//---------------------- Tests-------------------
Route::resource('tests','TestController');
Route::get('all-tests','TestController@getTests');

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

// ----------------------- rooms----------------
Route::resource('rooms','RoomsController');
Route::get('available_begins_for_the_room','RoomsController@getAvailableBegins');
Route::get('available_ends_for_the_room','RoomsController@getAvailableEnds');
Route::get('/all-rooms','RoomsController@allRooms');
Route::get('/rooms-calendar/{room}','RoomsController@showRoomCalendar');

//------------------ Diplomas ---------------
Route::resource('diplomas','DiplomaController');

// -------------------instructor----------------
Route::resource('instructors','InstructorsController');
Route::post('search_instructor','InstructorsController@searchInstructors');
Route::get('/all-instructors','InstructorsController@allInstructors');
Route::get('/instructors-calendar/{instructor}','InstructorsController@showInstructorCalendar');

//-------------------- jobs ---------------------
Route::resource('jobs','jobController');
//-------------------- settings ---------------------
Route::get('settings/instructorSettings','settingsController@instructorSettings');
Route::get('settings/instructorPassReset','settingsController@instructorPassReset');

Route::get('calendar', function(){
    return view('Calendar/calendar');
});

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
