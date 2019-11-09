<?php

namespace App\Http\Controllers;

use App\Center;
use App\TestGroup;
use Illuminate\Http\Request;
use App\Student;
use App\Test;
use App\TestEnrollments;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Monolog\Handler\StubNewRelicHandlerWithoutExtension;

class TestEnrollmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
//        $this->getTestEnrollments();
        $tests = Test::all();
        return view('testEnrollments.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $students = Student::all();
        // todo center
        $center = Center::find(7);
        $tests = $center->tests;
//        dd($tests);

            // return 'he has already enrolled in at least one test';
        return view('testEnrollments.create')
            ->with('students',$students)
            ->with('tests',$tests);
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
            $stu_name = request()->get('stu_name');
            $test_id = request()->get('test_id');
            $group_id = request()->get('group_id');
        }

        if($this->checkTestEnrollmentValidation($stu_name,$test_id)){
            return 'student has already enrolled in this test';
        }else{
            $date = TestGroup::find($group_id)->group_date;
            if($this->checkEnrollmentTimeValidation($stu_name, $date)){
                return 'student has already enrolled in a test at this time';
            }
            else{
                Student::findOrFail($stu_name)->testsEnrolling()->syncWithoutDetaching($group_id);
                return 'student has successfully enrolled in this test';
            }
        }

    }

    // check if a students has already enrolled in a test or not
    public function checkTestEnrollmentValidation($stu_name, $test_id){
        $groups =  Test::findOrFail($test_id)->groups;
        foreach ($groups as $group){
            if($group->enrollers->contains($stu_name)){
                return true;
            }

        }
        return false;
    }

    // check if a students has already enrolled in a test at specific date
    public function checkEnrollmentTimeValidation($stu_name, $date){
        foreach (TestGroup::where('group_date', $date)->get() as $group){
            if($group->enrollers->contains($stu_name)){
                return true;
            }

        }
        return false;

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

    public function getTestEnrollments()
    {
        if(request()->ajax()){
            $test_id = request()->get('test_id');
        }

        // todo determine center
        $test = Test::with('groups')->findOrFail($test_id);
        foreach ($test->groups as $group){
            $group->enrollers;
        }

//        echo json_encode($test);
        return $test ;

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

