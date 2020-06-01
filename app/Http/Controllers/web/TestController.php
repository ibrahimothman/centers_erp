<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Rules\UniquePerCenter;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class TestController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $this->authorize('view', Test::class);
        return view('test.index');
    }
    public function getTests(){
        $center = Center::findOrFail(Session('center_id'));
        $tests = Test::allTests($center);
        return response()->json($tests, 200);
    }


    public function create()
    {
        //check if auth user has rights to view create_test_form
        $this->authorize('create',Test::class);
        return view('test.create');
    }


    public function store(Request $request)
    {

        // check if auth user has rights to add a new test
        $this->authorize('create',Test::class);
        $center = Center::findOrFail(Session('center_id'));
        $data = $this->validateRequest($request);
        DB::transaction(function () use ($center, $data){
            $test = $center->tests()->create($data->validate());
            $this->setRetake($test);
        });

        $next = $request->get('next') == 'tests' ? 'tests' : 'tests/create';
        return redirect($next)->with('success', 'Test added successfully');

    }

    public function edit(Test $test)
    {
        //
        $this->authorize('update',$test);
        return view('test.edit')->with('test',$test);

    }

    public function update(Request $request, Test $test)
    {

        $this->authorize('update',$test);
        $data = $this->validateRequest($request);
        DB::transaction(function () use ($test, $data){
            $test->update($data->validate());
            $this->setRetake($test);
        });
        return redirect('/tests')->with('success','test updated');

    }


    public function destroy(Test $test)
    {
        $this->authorize('delete',$test);
        $test->delete();
    }


    public function getStudents($id)
    {

        // return 'listTestStudents';
        $students = DB::table('students')
            ->join('student_tests', 'students.id', '=', 'student_tests.student_id')
            ->where('student_tests.test_id',$id)
            ->get();
        return view('studentTest.show')->with('students',$students);
    }
    public function testTime(){
        // return 'test add time';
        return view ('testGroup.test-time-add');
    }




    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), Test::rules($request));
    }

    private function setRetake($test)
    {
        if(request()->has('retake')){
            $test->update(['retake' => 1]);
        }else{
            $test->update(['retake' => 0]);
        }
    }


}
