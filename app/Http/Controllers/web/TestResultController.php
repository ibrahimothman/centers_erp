<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Student;
use App\Test;
use App\TestGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;


class TestResultController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $center = Center::findOrFail(Session('center_id'));
        $tests = $center->tests;
        if(Input::get('test')) {
            $test_id = explode(',', Input::get('test'), 2)[0];
            $group_id = explode(',', Input::get('test'), 2)[1];

            $test = $center->tests()->findOrFail($test_id);
            $students = $test->groups()->findOrFail($group_id)->enrollers;
            return view('testResult.test-result',compact([
                'tests' => $tests,
                'test' => $test,
                'students' => $students
            ]));
        }

        return view('testResult.test-result')->with([
            'tests' => $tests,
            'test' => null,
            'students' => null
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        return $this->getTestGroupStudents();
        $center = Center::findOrFail(Session('center_id'));
        $tests = $center->tests;
        return view('testResult.test-result-add',compact('tests'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        if(request()->ajax()){
            $s_id = request()->get('student_id');
            $g_id = request()->get('group_id');
            $result = request()->get('result');
        }
        Student::findOrFail($s_id)->testsEnrolling()->updateExistingPivot($g_id,array('result' => $result));
        return 'successfully updated';
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }





}
