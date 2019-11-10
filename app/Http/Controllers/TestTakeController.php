<?php

namespace App\Http\Controllers;

use App\Student;
use App\Test;
use App\TestTake;
use App\Utility;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Symfony\Component\HttpFoundation\File\File;

class TestTakeController extends Controller
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

        return view('testTakes/test-take');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //todo mvalidation
        // todo get todays test groups only
        // todo paginate


        $utility=new Utility();
        $today=$utility->getCurrentDay();
        $testGroups=DB::table('test_groups')
            ->join("tests",'test_groups.test_id','=','tests.id')
            ->where('tests.center_id','=',auth()->user()->center->id)
            ->get();
        if (Input::get('test')!=null)
            $testGroups=DB::table('test_groups')
                ->join("tests",'test_groups.test_id','=','tests.id')
                ->where('tests.center_id','=',auth()->user()->center->id)
                ->where('tests.id','=',Input::get('test'))
                ->get();
        foreach ($testGroups as $testGroup){
            $testGroup->students=DB::table('student_test_group')
                ->join("students",'student_test_group.student_id','=','students.id')
                ->join("tests",'student_test_group.test_group_id','=','tests.id')
                ->where('student_test_group.test_group_id','=',$testGroup->id)
                ->where('tests.center_id','=',auth()->user()->center->id)
                ->select(['students.*' ,'student_test_group.id','student_test_group.take'])
                ->get();
        }

//        echo json_encode($testGroups);
        return view('testTakes/test-take')
            ->with('testGroups',$testGroups);
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
            $student_id =request()->get('student_id');
            $group_id =request()->get('group_id');
            $take =request()->get('take');
        }

        Student::findOrFail($student_id)->testsEnrolling()->updateExistingPivot($group_id,array('take' => $take));

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

    public function confirmTestAttendance(){

        return "attendence confirmed";
    }

    public function uploadImage(Request $request,$key){
        $file = Input::file($key);
        $imageName = time().'.'.$file->getClientOriginalExtension();

        return $file->move(public_path('/uploads'), $imageName);
    }

    private function getPath(File $file){
        return url("/uploads/".pathinfo($file)['basename']);
    }
}
