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

//        $groups = $center->diploma_groups();
//        return json_encode($groups);
        $diplomas = Diploma::with('courses.instructors')->where('center_id', $center->id)->get();
//        return json_encode($diplomas);
//        $instructor = $center->instructors->first();
//        return json_encode($instructor->busyTimes()->where('day', '2020-04-07'));
//        foreach ($instructor->diplomaGroups as $diplomaGroup){}
//        return json_encode($instructor);
//        $rooms = $center->rooms;

        return view('courseGroups.course_group_create', compact('diplomas'));
    }

    public function store(Request $request)
    {
//        dd($request->all());
        $data = $this->validateCourseGroupData($request);
//        if($data->fails()){
//            dd($data->errors()->messages());
//        }
        $center = Center::findOrFail(Session('center_id'));
////        dd($data);
        $data = $data->validate();
        $group = $center->diplomas()->findOrFail($data['diploma'])->groups()->create([
            'instructor_id' => $data['instructor_id'],
            'starts_at' => $data['starts_at']
        ]);

        // create times
        $times = Time::addTimes($data['diploma-days'],$data['diploma-begins'],$data['diploma-ends']);
//        dd($times);
        $times_rooms = [];
        foreach ($times as $i => $time){
            $temp['time_id'] = $time->id;
            $temp['room_id'] = $data['diploma-rooms'][$i];

            $times_rooms[] = $temp;
        }


        $group->times()->sync($times_rooms);

        return redirect("diploma-groups");
    }

    public function destroy($group)
    {
        DiplomaGroup::findOrFail($group)->delete();
        return redirect('diploma-groups');
    }

    private function validateCourseGroupData(Request $request)
    {

        return Validator::make($request->all(), DiplomaGroup::rules());
    }
}
