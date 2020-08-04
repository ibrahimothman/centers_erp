<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Course;
use App\CourseGroup;
use App\Employee;
use App\Room;
use App\Rules\courseGroupDay;
use App\Test;
use App\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use mysql_xdevapi\Session;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;


class CourseGroupController extends Controller
{

    public function index()
    {
        //

        $this->authorize('viewAny', Course::class);
        $courses = Course::allCourses($this->center);
        $allCourses = $this->center->courses;
        return view('courseGroups/index', compact('courses','allCourses'));
//
    }

    public function create()
    {

        $this->authorize('create', Course::class);
        $courses = $this->center->courses;
        $rooms = $this->center->rooms;
        return view('courseGroups/course_group_create', compact('courses','rooms'));
    }

    public function store(Request $request)
    {

        $this->authorize('create', Course::class);
        // fetch validated date
        $data = $this->validateCourseGroupData();

        $course_group = $this->center->courses()->findOrFail($data['course'])->groups()->create([
                'name' => $data['name'],
                'start_at' => $data['start_at'],
            ]);

        // create times
        $times = Time::addTimes($data['course-day'],$data['course-begin'],$data['course-end']);

        // attach times to group
        foreach($times as $time){
            $course_group->times()->syncWithoutDetaching($time);
        }

        // attach times to the room
        foreach($times as $time){
            Room::findOrFail($data['room'])->times()->syncWithoutDetaching($time);
        }

        // attach course_group to the room
        Room::findOrFail($data['room'])->course_groups()->syncWithoutDetaching($course_group);

        return redirect('/course_groups');
    }


    public function destroy(CourseGroup $courseGroup)
    {

        $this->authorize('delete', Course::class);
        $courseGroup->delete();
        return redirect('course_groups');

    }

    private function validateCourseGroupData()
    {

        $today_date = Carbon::now()->toDateString();
        return request()->validate([
            'name' => 'required|unique:course_groups,name',
            'start_at' => "required|date|after_or_equal:$today_date",
            'course' => 'required',
            'room' => 'required',
            'course-begin' => 'required|array',
            'course-end' => 'required|array',
            'course-day' => ['required','array'],

        ]);
    }



    public function getCourseGroups()
    {
        $course_id  = request()->get('course_id');
        return Course::with('groups')->findOrFail($course_id)->groups;
    }




}
