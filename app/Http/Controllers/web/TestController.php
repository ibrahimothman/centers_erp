<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use Illuminate\Http\Request;
use App\Test;
use Illuminate\Support\Facades\DB;
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


    public function store()
    {
        // check if auth user has rights to add a new test
        $this->authorize('create',Test::class);
        $center = Center::findOrFail(Session('center_id'));
        $test = $center->tests()->create($this->validateRequest(''));
        $this->setRetake($test);

        return redirect('/tests');

    }

    public function edit(Test $test)
    {
        //
        $this->authorize('update',$test);
        return view('test.edit')->with('test',$test);

    }

    public function update(Test $test)
    {

        $this->authorize('update',$test);
        $test->update($this->validateRequest($test->id));
        $this->setRetake($test);
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
