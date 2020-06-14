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
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use function foo\func;

$web_controllers_path = "\App\Http\Controllers\web";

Route::group([
    'middleware' => ['auth', 'verified'],
    ], function () use ($web_controllers_path){

    //-------------------- settings ---------------------
    Route::resource('settings', "$web_controllers_path\SettingController");

        //------------------------ center -------------
        Route::resource('centers', "$web_controllers_path\CenterController");
    Route::group(['middleware' => 'center'], function ()use ($web_controllers_path){


        //--------------------------- employees ------------------
        Route::resource('employees', "$web_controllers_path\EmployeeController");
        Route::get('search_for_employees', "$web_controllers_path\EmployeeController@getEmployees");

        // --------------------- students --------------------
        Route::get('/', "$web_controllers_path\StudentController@create");
        Route::resource('students', "$web_controllers_path\StudentController");

        Route::get('students.table', "$web_controllers_path\StudentController@showTable")->name('students.table');
        Route::get('/search_for_students', "$web_controllers_path\StudentController@searchByName");
        Route::get('/get_student_tests', "$web_controllers_path\StudentController@getTests");
        Route::get('/get_student_diplomas', "$web_controllers_path\StudentController@getDiplomas");


        //---------------------- Tests-------------------
        Route::resource('tests', "$web_controllers_path\TestController");
        Route::get('all-tests', "$web_controllers_path\TestController@getTests");

        //--------------------- Test Groups -------------------------
        Route::resource('test-groups', "$web_controllers_path\TestGroupController");
        Route::get('/get_test_groups', "$web_controllers_path\TestGroupController@getTestGroups");
        Route::post('/close_group', "$web_controllers_path\TestGroupController@closeGroup");

        //----------------------- Test Enrollment---------------
        Route::resource('test-enrollments', "$web_controllers_path\TestEnrollmentController");
        Route::get('get_tests_enrollments', "$web_controllers_path\TestEnrollmentController@getTestEnrollments");
        Route::delete('delete-test-enrollments', "$web_controllers_path\TestEnrollmentController@deleteEnrollment");

        //----------------------- test takes ------------
        Route::resource('test-takes', "$web_controllers_path\TestTakeController");

        //----------------------- test results ------------
        Route::resource('test-results', "$web_controllers_path\TestResultController");

        //----------------------- statement ------------
        Route::resource('test-statements', "$web_controllers_path\TestStatementController");
        Route::get('test-statements-preview/{student}', "$web_controllers_path\TestStatementController@previewStatement");


        //----------- courses ---------------
        Route::resource('courses', "$web_controllers_path\CoursesController");
        Route::resource('course_groups', "$web_controllers_path\CourseGroupController");
        Route::get('/get_course_groups', "$web_controllers_path\CourseGroupController@getCourseGroups");
        Route::resource('course_enrollment', "$web_controllers_path\CourseEnrollmentController");
        Route::get('get_course_enrollments', "$web_controllers_path\CourseEnrollmentController@getCourseEnrollments");

        //-------------------- categories -----------------------
        Route::resource('categories', "$web_controllers_path\CategoryController");
        Route::get('all_categories', "$web_controllers_path\CategoryController@allCategories");

        // ----------------------- rooms----------------
        Route::resource('rooms', "$web_controllers_path\RoomsController");
        Route::get('available_begins_for_the_room', "$web_controllers_path\RoomsController@getAvailableBegins");
        Route::get('available_rooms', "$web_controllers_path\RoomsController@getAvailableRooms");
        Route::get('/all-rooms', "$web_controllers_path\RoomsController@allRooms");
        Route::get('/rooms-calendar/{room}', "$web_controllers_path\RoomsController@showRoomCalendar");

        //------------------ Diplomas ---------------
        Route::resource('diplomas', "$web_controllers_path\DiplomaController");

        //----------------- Diploma Groups----------------
        Route::resource('diploma-groups', "$web_controllers_path\DiplomaGroupController");
        Route::get('all-diplomas', "$web_controllers_path\DiplomaGroupController@allDiplomas");

        //----------------- Diploma enrollment----------------
        Route::resource('diploma-enrollments', "$web_controllers_path\DiplomaEnrollmentController");
        Route::resource('update-diploma-enrollments', "$web_controllers_path\DiplomaEnrollmentController@update");
        Route::get('/get_student_enrollment', "$web_controllers_path\DiplomaEnrollmentController@getStudentEnrollment");

        // -------------------instructor----------------
        Route::resource('instructors', "$web_controllers_path\InstructorsController");
        Route::get('search_for_instructors', "$web_controllers_path\InstructorsController@searchInstructors");
        Route::get('/all-instructors', "$web_controllers_path\InstructorsController@allInstructors");
        Route::get('/instructors-calendar/{instructor}', "$web_controllers_path\InstructorsController@showInstructorCalendar");
        Route::post('update_instructor_payment', "$web_controllers_path\PaymentModelController@updateInstructorPayment");
        Route::get('available_begins_for_the_instructor', "$web_controllers_path\InstructorsController@getAvailableBegins");
        Route::get('available_ends_for_the_instructor', "$web_controllers_path\InstructorsController@getAvailableEnds");

        //-------------------- jobs ---------------------
        Route::resource('jobs', "$web_controllers_path\jobController");


        // ------------------------- Calendar -----------------------
        Route::get('calendar', function () {
            return view('Calendar/calendar');
        });

        //------------------- Finance -------------
        Route::resource('finance', "$web_controllers_path\FinanceController");
        Route::get('dept', function () {
            return view('financialManagement/dept');
        });
        Route::resource('profits', "$web_controllers_path\ProfitController");
        Route::resource('expenses', "$web_controllers_path\ExpensesController");
        Route::resource('salaries', "$web_controllers_path\SalaryController");
//        Route::get('/expenses/{id}/{type}', "$web_controllers_path\ExpensesController@edit")->name('expenses.edit');
        Route::resource('revenues', "$web_controllers_path\RevenueController");
        Route::resource('refund', "$web_controllers_path\RefundController");
        Route::resource('transactions', "$web_controllers_path\TransactionController");
        Route::get('all_transactions', "$web_controllers_path\TransactionController@allTransactions");

        //---------------- payment model -----------------
        Route::resource('payment_models', "$web_controllers_path\PaymentModelController");
        Route::resource('payments', "$web_controllers_path\PaymentController");
    });


});



Route::resource('invites',"$web_controllers_path\InvitationController");
Route::get('process',"$web_controllers_path\InvitationController@processInvitation");



Auth::routes(['verify' => true]);

