<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Course;
use App\Diploma;
use App\DiplomaGroup;
use App\Instructor;
use App\Room;
use App\Time;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use mysql_xdevapi\Session;

class DiplomaGroupController extends Controller
{

    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $diplomas = Diploma::allDiplomas($center);
        $allDiplomas = $center->diplomas;
        return view('diploma.allgroups', compact('allDiplomas','diplomas'));
    }

    public function create()
    {

        $center = Center::findOrFail(Session('center_id'));
        $diplomas = Diploma::with('courses.instructors')->where('center_id', $center->id)->get();
        return view('diploma.diploma_group_create', compact('diplomas'));
    }

    public function store(Request $request)
    {
        $data = $this->validateCourseGroupData($request);

        $center = Center::findOrFail(Session('center_id'));
        $data = $data->validate();
        $group_data = Arr::except($data,['diploma','diploma-days','diploma-begins','diploma-ends', 'diploma-rooms']);

        $group = $center->diplomas()->findOrFail($data['diploma'])->groups()->create($group_data);

        // create times
        $times = Time::addTimes($data['diploma-days'],$data['diploma-begins'],$data['diploma-ends']);


        $group->times()->sync($this->createTimesRoomsForGroup($times, $data['diploma-rooms']));

        return redirect("diploma-groups");
    }

    public function edit(DiplomaGroup $diplomaGroup)
    {
        $instructors = $diplomaGroup->diploma->instructors();

//        return json_encode($diplomaGroup->times);
        return view('diploma.diploma_update_register', compact('diplomaGroup', 'instructors'));
    }

    public function update(Request $request, DiplomaGroup $diplomaGroup)
    {
        $data = $this->validateCourseGroupData($request);

        $data = $data->validate();
        $group_data = Arr::except($data,['diploma','diploma-days','diploma-begins','diploma-ends', 'diploma-rooms']);

        // create times
        $times = Time::addTimes($data['diploma-days'],$data['diploma-begins'],$data['diploma-ends']);

        $diplomaGroup->times()->sync($this->createTimesRoomsForGroup($times, $data['diploma-rooms']));

        $group = $diplomaGroup->update($group_data);
        return redirect('diploma-groups');
    }

    public function destroy($group)
    {
        DiplomaGroup::findOrFail($group)->delete();
        return redirect('diploma-groups');
    }

    private function validateCourseGroupData(Request $request)
    {

        return Validator::make($request->all(), DiplomaGroup::rules($request));
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
}
