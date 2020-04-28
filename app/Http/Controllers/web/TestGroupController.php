<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Role;
use App\Room;
use App\Time;
use http\Exception\BadConversionException;
use Illuminate\Http\Request;
use App\Test;
use App\TestGroup;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;
use phpDocumentor\Reflection\Types\Null_;

class TestGroupController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // todo something wrong while calculating available_seats

//        $this->authorize('viewAny',TestGroup::class);

        $center = Center::findOrFail(Session('center_id'));;
        $allTests = $center->tests;

        $tests = Test::allTests($center);

        return view('testGroup.index')
            ->with('allTests',$allTests)
            ->with('tests',$tests);
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
        $allTests = $center->tests;

        $test = Input::has('id')? Test::allTests($center)[0]: new Test();

         return view('testGroup.create')
             ->with('selected_test',$test)
             ->with('begins',Time::hours())
             ->with('allTests',$allTests);
    }

    public function store(Request $request)
    {

        // check if user has rights to add a new test-group
//        $this->authorize('create',TestGroup::class);
        //todo handle multiple groups

        $data = $this->validateRequest($request);

        if($data->fails()){
            dd($data->errors()->messages());
            return back()->with('error', 'Please fill in all fields');
        }

        $data = $data->validate();
        // add times
        $times = [];
        foreach ($data['groups'] as $test_group){
            $group = TestGroup::create([
                'test_id' => $data['test_id'],
                'available_chairs' => $test_group['available_chairs'],
            ]);

            // create a tiem
            $time = Time::addTime($test_group['date']);
            // attach each group to time and room
            $group->times()->sync([
                $time->id => ['room_id' => $test_group['room']]
            ]);

        }
        return redirect('/test-groups/create')->with('success', 'test group is successfully created');


    }


    public function show(TestGroup $testGroup)
    {
        // todo this view is missing
//        return json_encode($testGroup->times);
    }


    public function edit(TestGroup $testGroup)
    {
        //
//        dd(Time::hours()[9] == $testGroup->times[0]->begin);
//        $this->authorize('update',$testGroup);
        return view('testGroup.edit')->with('test_group',$testGroup);
    }


    public function update(Request $request, TestGroup $testGroup)
    {


//        $this->authorize('update',$testGroup);
        $data = $this->validateRequest($request);

        if($data->fails()){
            dd($data->errors()->messages());
            return back()->with('error', 'Please fill in all fields');
        }

        $data = $data->validate();

        $time = Time::addTime($data['date']);

        if($this->isThereGroupInSameTimeInSameRoom($data['test_id'], $testGroup, $time, $data['room'])){
            return back()->with('error', 'There is a group in same time in same room');
        }

        // update group time and room
        $testGroup->times()->sync([
            $time->id => ['room_id' => $data['room']]
        ]);

        // update group
        $testGroup->update([
            'available_chairs' => $data['available_chairs'],

        ]);

        // todo this view is missing
        return back()->with('success','group successfully updated');

    }


    public function destroy(TestGroup $testGroup)
    {
        //
//        $this->authorize('delete',$testGroup);
        $testGroup->delete();
        return redirect('/test-groups')
            ->with('message','test group deleted successfully');

    }


    public function closeGroup(){

        if(request()->ajax()){
            $group_id = request()->get('group_id');
        }
        TestGroup::findOrFail($group_id)->update([
            'opened' => 0
        ]);

        return 'this group is closed';
    }




    private function validateRequest(Request $request)
    {
        return Validator::make($request->all(), TestGroup::rules($request));
    }

    /*
     * create times_rooms array
     * [time_id, room_id]
     * */
    private function createTimesRoomsForGroup(array $times, array $rooms)
    {
        $times_rooms = [];
        foreach ($times as $i => $time){
            $temp['time_id'] = $time->id;
            $temp['room_id'] = $rooms[$i];

            $times_rooms[] = $temp;
        }

        return $times_rooms;
    }

    private function isThereGroupInSameTimeInSameRoom($test_id, $test_group,  $time, $room_id)
    {
        return count(Test::findOrFail($test_id)->groups->filter(function ($group) use ($time, $test_group, $room_id){
            return $group->times[0]->time_id == $time->id && $group->times[0]->pivot->room_id == $room_id  && $group->id <> $test_group->id;
        })) != 0;

    }


}
