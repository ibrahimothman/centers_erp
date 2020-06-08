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

    public function index()
    {
        $this->authorize('view', Test::class);

        $center = Center::findOrFail(Session('center_id'));
        $tests = Test::allTests($center);


        return view('testResult.test-result')->with([
            'tests' => $tests,

        ]);

    }


    public function create()
    {
        //
        $this->authorize('create', Test::class);
        $center = Center::findOrFail(Session('center_id'));
        $tests = Test::allTests($center);

        // get only opened groups which have students
//        $tests = $tests->each(function ($test) use (&$tests){
//           return $test->groups->filter(function ($group){
//              return $group->opened ;
//           });
//        });

//        return json_encode($tests);
        return view('testResult.test-result-add',compact('tests'));
    }


    public function store()
    {
        $this->authorize('create', Test::class);
        if(request()->ajax()){
            $s_id = request()->get('student_id');
            $g_id = request()->get('group_id');
            $result = request()->get('result');
        }
        Student::findOrFail($s_id)->testsEnrolling()->updateExistingPivot($g_id,array('result' => $result));
        return response()->json('successfully updated', 200);
    }






}
