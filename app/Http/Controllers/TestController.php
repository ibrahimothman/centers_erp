<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tests = Test::orderBy('created_at','desc')->get();
        return view('test.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('test.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $center = Center::find(1);
        $test = $center->tests()->create($this->validateRequest(''));
        $this->setRetake($test);

//        dd($test);
        return redirect('/tests');

    }

//    public function checkTest(Request $request){
//        if($request->ajax()){
//            $test_name = $request->get('test_name');
//        }
//
//        $test_name = DB::table('tests')->where('name','=',$test_name)->count();
//        if($test_name > 0) return 0;
//        else return 1;
//    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $test = Test::find($id);
        $testGroups=DB::table('test_groups')
            ->leftJoin('test_enrollments','test_groups.id','=','test_enrollments.test_group_id')
            ->selectRaw('test_groups.*, count(test_enrollments.id) as enrollmentsCount')
            ->groupBy('test_groups.id')
            ->where('test_groups.test_id',$id)
            ->get();

        $enrollments =DB::table('test_enrollments')
            ->join('users','test_enrollments.student_id','=','users.id')
            ->join('test_groups','test_enrollments.test_group_id','=','test_groups.id')
            ->join('tests','test_groups.test_id','=','test_id')
            ->where('tests.id',$id)
            ->paginate(10)
            ->items();

        return view('test.test-det-view-one')
            ->with('test',$test)
            ->with('testGroups',$testGroups)
            ->with('enrollments',$enrollments)
            ->with('id',$id);

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
        $test = Test::find($id);
        return view('test.edit')->with('test',$test);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Test $test)
    {

        $test->update($this->validateRequest($test->id));
        $this->setRetake($test);
        return redirect('/tests')->with('success','test updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Test $test)
    {

        $test->delete();

        return redirect('/tests')->with('success','test is deleted');
    }

    /**
     * list all students enrolling in specefic test.
     *
     * @param  int  $testId
     * @return \Illuminate\Http\Response
     */
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

    public  function getTests(){
        $tests = Test::all();
        return response()->json($tests);
    }
    public  function searchTest(Request $request){
        if($request->ajax()){
            $query = $request->get('query');
            if($query != ''){
                $tests = Db::table('tests')
                    ->where('name','like','%'.$query.'%')
                    ->get();
            }
        }

        return response()->json($tests);

    }

    private function validateRequest($test_id)
    {
        return request()->validate([
            'name' => 'required|unique:tests,name,'.$test_id,
            'description' => 'required',
            'cost_ind' => 'required|integer',
            'cost_course' => 'required|integer',

        ]);
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
