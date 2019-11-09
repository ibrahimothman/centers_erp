<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Test;
use App\TestGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Null_;

class TestGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'test '.Input::get('test');
        //Input::get('test'
        $allTests = DB::table('tests')
            ->get();

        $tests = DB::table('tests');
        if (Input::get('test')!=null)
            $tests=$tests->where('id',Input::get('test'));
        $tests=$tests->paginate(2);

        foreach ($tests as $test){
            $groups=DB::table('test_groups')
                ->orderBy('group_date','desc')
                ->where('test_id',$test->id)
                ->get();
            for ($j=0;$j<count($groups);$j++){
                $groups[$j]->available_seats= 20;

            }
            $test->groups=$groups;
        }

        return view('testGroup.index')
            ->with('tests',$tests)
            ->with('allTests',$allTests);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tests = Test::orderBy('created_at','desc')->paginate(10);

        $testName=null;
        if (Input::get('test')!=null)
            $testName=Input::get('test');
            return view('testGroup.create')
                ->with('tests',$tests)
                ->with('testName',$testName);
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
//        $this->validate($request,[
//            'test' => 'required',
//            'test_time' => 'required',
//            'seat' => 'required',
//
//        ]);
//
//        $testId = $request->input('test');
//        $date = $request->input('test_time');
//        $seats = $request->input('seat');
//
//
//
//        $testGroup = new TestGroup;
//        $testGroup->test_id = $testId;
//        $testGroup->available_chairs = $seats;
//        $testGroup->group_date = $date;
        //todo handle multiple groups

        $this->validate($request,[
            'testName' => 'required',
            'test_time2' => 'required',
            'seat2' => 'required',

        ]);

        $test = $request->input('testName');
        $date = $request->input('test_time2');
        $seats = $request->input('seat2');


        $testId=DB::table('tests')
            ->where('name',$test)
            ->first();

        if ($testId==null)
            $this->throwValidationException(['test'=>'this test oes not exist']);


        $testGroup = new TestGroup;
        $testGroup->test_id = $testId->id;
        $testGroup->available_chairs = $seats;
        $testGroup->group_date = $date;

//        $testGroup = new TestGroup;
//        $testGroup->test_id = $testId;
//        $testGroup->available_chairs = $seats;
//        $testGroup->group_date = $date;

        $testGroup->save();

        return redirect('/test-groups/create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // return $id;
        //$testGroup = TestGroup::find($id);
         $testGroup = DB::table('test_groups')
             ->join('tests','test_groups.test_id','=','tests.id')
             ->where('test_groups.test_id',$id)
             ->first();
//        return view('test.test-det-view-one')
//            ->with('testGroup',$testGroup) ;
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
        $testGroup = TestGroup::find($id);
        return view('testGroup.edit')->with('testGroup',$testGroup);
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
        $this->validate($request,[
            'test_group_date' => 'required',
            'test_group_chairs' => 'required',
            'test_group_hall' => 'required'
        ]);
        $date = $request->input('test_group_date');
        $chairs = $request->input('test_group_chairs');
        $hall = $request->input('test_group_hall');

        $testGroup = TestGroup::find($id);
        $testGroup->available_chairs = $chairs;
        $testGroup->hall_number = $hall;
        $testGroup->group_date = $date;
        $testGroup->save();

        return redirect('/test_group/'.$testGroup->id)->with('sucsess','group updated');

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
        $testGroup = TestGroup::find($id);
        $testGroup->delete();
        return redirect('/test-groups')
            ->with('message','test group deleted successfully');

    }

    /**
     * Get all test groups.
     *
     * @param  int $testId
     * @return \Illuminate\Support\Collection
     */

    public function closeGroup(){

        if(request()->ajax()){
            $group_id = request()->get('group_id');
        }
        TestGroup::findOrFail($group_id)->update([
            'opened' => 0
        ]);

        return 'this group is closed';
    }
    private function throwValidationException(array $errors){
        $error = ValidationException::withMessages($errors);
        throw $error;
    }

    public function getTestGroups()
    {
        $test_id  = request()->get('test');
        return Test::with('groups')->findOrFail($test_id)->groups;
    }
}
