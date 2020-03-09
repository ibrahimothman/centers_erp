<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Test;
use App\Student;
use App\StudentTest;
use DB;

class StudentTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($studentId)
    {
        //

        $student = Student::find($studentId);
        $tests = DB::table('tests')
                    ->join('student_tests', 'tests.id', '=', 'student_tests.test_id')
                    ->where('student_tests.student_id','!=',$studentId)
                    ->get();
        if(count($tests) == 0){
            /*  no tests he has enrolled in
                so list all tests for him
            */
            // return 'he has not enrolled in any tests yet';
            $tests = Test::orderBy('created_at','desc')->paginate(10);

        }
            // return 'he has already enrolled in at least one test';
        return view('studentTest.create')->with('students',$student)->with('tests',$tests);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $studentTest = new StudentTest;
        $studentTest->student_id = $request->input('student_id');
        $studentTest->test_id = $request->input('test_id');
        $studentTest->save();

        return redirect('/Student/'.$request->input('student_id').'/enrollment?');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //


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

    /**
     * unEnroll students from a test.
     *
     * @param  int  $studentId
     * @param  int  $testId
     * @return \Illuminate\Http\Response
     */
    public function unEnroll($studentId,$testId)
    {
        //
        // $studentTest = StudentTest::find($studentId,$testId);
        // $studentTest.delete();

        DB::table('student_tests')
            ->where('student_id', $studentId)
            ->where('test_id', $testId)
            ->delete();
    }





}
