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
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $center = Center::findOrFail(Session('center_id'));
        $courses = Course::allCourses($center);
        $allCourses = $center->courses;
        return view('courseGroups/index', compact('courses','allCourses'));
//
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $center = Center::findOrFail(Session('center_id'));
        $courses = $center->courses;
        $rooms = $center->rooms;
        return view('courseGroups/course_group_create', compact('courses','rooms'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // fetch validated date
        $data = $this->validateCourseGroupData();
//        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));

        $course_group = $center->courses()->findOrFail($data['course'])->groups()->create([
                'name' => $data['name'],
                'start_at' => $data['start_at'],
            ]);

        // create times
        $times = Time::addTimes($data['course-day'],$data['course-begin'],$data['course-end']);
//        dd($times);

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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(CourseGroup $courseGroup)
    {
        //

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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(CourseGroup $courseGroup)
    {
        //
//        dd($courseGroup);
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
