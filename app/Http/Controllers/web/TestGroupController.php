<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;

use App\Time;
use Illuminate\Http\Request;
use App\Test;
use App\TestGroup;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class TestGroupController extends Controller
{

    public function index()
    {
        // todo something wrong while calculating available_seats

        $this->authorize('view',Test::class);

        $allTests = $this->center->tests;

        $tests = Test::allTests($this->center);

//        return json_encode($tests);
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
        $this->authorize('create',Test::class);
        $allTests = $this->center->tests;

        $test = Input::has('id')? Test::allTests($this->center)[0]: new Test();


         return view('testGroup.create')
             ->with('selected_test',$test)
             ->with('begins',Time::hours())
             ->with('allTests',$allTests);
    }

    public function store(Request $request)
    {

        // check if user has rights to add a new test-group
        $this->authorize('create',Test::class);
        //todo handle multiple groups

        $data = $this->validateRequest($request);

        if($data->fails()){
            return back()->with('error', 'Please fill in all fields');
        }

        $data = $data->validate();
        // add times

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



    public function edit(TestGroup $testGroup)
    {
        //
        $this->authorize('update',Test::class);

        return view('testGroup.edit')->with('test_group',$testGroup);
    }


    public function update(Request $request, TestGroup $testGroup)
    {


        $this->authorize('update',Test::class);
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
        $this->authorize('delete',Test::class);

        $testGroup->delete();
        return response()->json(['message' => 'successfully deleted'], 200);

    }


    public function closeGroup(){

        if(request()->ajax()){
            $group_id = request()->get('group_id');
        }
        $group = TestGroup::findOrFail($group_id);
        $group->update([
            'opened' => !$group->opened
        ]);

        $data = $group->opened? 'group reopened' : 'group closed';
        return response()->json($data, 200);
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
