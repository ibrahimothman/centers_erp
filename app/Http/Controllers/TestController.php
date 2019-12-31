<?php

namespace App\Http\Controllers;

use App\Center;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;

class TestController extends Controller
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

//        $this->authorize('viewAny',Test::class);
        $center = Center::findOrFail(Session('center_id'));
        $tests = $center->tests()->orderBy('created_at','desc')->get();
        return view('test.index',compact('tests'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //check if auth user has rights to view create_test_form
//        $this->authorize('create',Test::class);
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
        // check if auth user has rights to add a new test
//        $this->authorize('create',Test::class);
        $center = Center::findOrFail(Session('center_id'));
        $test = $center->tests()->create($this->validateRequest(''));
        $this->setRetake($test);

        return redirect('/tests');

    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Test $test)
    {
        //

//        $this->authorize('view',$test);

        $testGroups=DB::table('test_groups')
            ->leftJoin('student_test_group','test_groups.id','=','student_test_group.test_group_id')
            ->selectRaw('test_groups.*, count(student_test_group.id) as enrollmentsCount')
            ->groupBy('test_groups.id')
            ->where('test_groups.test_id',$test->id)
            ->get();

        $enrollments =DB::table('student_test_group')
            ->join('students','student_test_group.student_id','=','students.id')
            ->join('test_groups','student_test_group.test_group_id','=','test_groups.id')
            ->join('tests','test_groups.test_id','=','test_id')
            ->where('tests.id',$test->id)
            ->paginate(10)
            ->items();

        return view('test.test-det-view-one')
            ->with('test',$test)
            ->with('testGroups',$testGroups)
            ->with('enrollments',$enrollments)
            ->with('id',$test->id);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Test $test)
    {
        //
//        $this->authorize('update',$test);
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

//        $this->authorize('update',$test);
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

//        $this->authorize('delete',$test);
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
