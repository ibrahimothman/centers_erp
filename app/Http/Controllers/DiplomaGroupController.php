<?php

namespace App\Http\Controllers;

use App\Center;
use App\Course;
use App\Diploma;
use App\DiplomaGroup;
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
        $rooms = $center->rooms;
        return view('diploma.diploma_register', compact('diplomas', 'rooms'));
    }

    public function store(Request $request)
    {
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
