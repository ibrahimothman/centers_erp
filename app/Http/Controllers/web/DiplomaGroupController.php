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
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
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
        dd($request->all());
        $group = DiplomaGroup::create(Arr::except($request->all(), ['instructors']));
        $group->instructors()->sync($request->all()['instructors']);

        return redirect("diploma-groups");
    }

    public function destroy($group)
    {
        DiplomaGroup::findOrFail($group)->delete();
        return redirect('diploma-groups');
    }
}
