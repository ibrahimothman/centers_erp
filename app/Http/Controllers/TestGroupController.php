<?php

namespace App\Http\Controllers;

use App\Center;
use App\Role;
use Illuminate\Http\Request;
use App\Test;
use App\TestGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Null_;

class TestGroupController extends Controller
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
        // todo something wrong while calculating available_seats

//        $this->authorize('viewAny',TestGroup::class);

        $center = Center::findOrFail(Session('center_id'));;
        $allTests = $center->tests;

        $tests = $center->tests()->paginate(2);
        if (Input::get('test')!=null)
            $tests=$center->tests()->where('id',Input::get('test'))->paginate(2);


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
        // check if user has rights to view create_test_group_form
//        $this->authorize('create',TestGroup::class);
        $center = Center::findOrFail(Session('center_id'));
        $tests = $center->tests()->orderBy('created_at','desc')->paginate(10);
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
        // check if user has rights to add a new test-group
//        $this->authorize('create',TestGroup::class);
        //todo handle multiple groups

        $this->validate($request,[
            'testName' => 'required',
            'test_time2' => 'required',
            'seat2' => 'required',

        ]);

        $test = $request->input('testName');
        $date = $request->input('test_time2');
        $seats = $request->input('seat2');


        $testId =Test::where('name',$test)->first()->id;

        TestGroup::create([
            'test_id' => $testId,
            'available_chairs' => $seats,
            'group_date' => $date,
        ]);

        return redirect('/test-groups/create');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(TestGroup $testGroup)
    {
        // todo this view is missing
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(TestGroup $testGroup)
    {
        //
//        $this->authorize('update',$testGroup);
        return view('testGroup.edit')->with('testGroup',$testGroup);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TestGroup $testGroup)
    {
        //
//        $this->authorize('update',$testGroup);
        $testGroup->update($this->validate($request,[
            'group_date' => 'required',
            'available_chairs' => 'required',
//            'opened' => 'required'
        ]));

        // todo this view is missing
//        return redirect('/test_group/'.$testGroup->id)->with('sucsess','group updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(TestGroup $testGroup)
    {
        //
//        $this->authorize('delete',$testGroup);
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
