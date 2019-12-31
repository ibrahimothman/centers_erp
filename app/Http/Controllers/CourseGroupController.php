<?php

namespace App\Http\Controllers;

use App\Center;
use App\Course;
use App\CourseGroup;
use App\Time;
use Carbon\Carbon;
use Illuminate\Http\Request;
use mysql_xdevapi\Session;


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
        return view('courseGroups/course_group_create', compact('courses'));
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
        $data = $this->validateCourseGroup();
//        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));
        // create a new course group
        $course_group = $center->courses()->findOrFail($data['course'])->groups()->create([
            'name' => $data['name'],
            'start_at' => $data['start_at'],
        ]);

        // create a new time
        $times = $this->addGroupTimes($course_group, $data['course-day'],$data['course-begin'],$data['course-end']);
        dd($course_group);
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
        $times = $courseGroup->times;
        return view('courseGroups/show', compact('times'));
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
    public function destroy($id)
    {
        //
    }

    private function validateCourseGroup()
    {
        $today_date = Carbon::now()->toDateString();
        return request()->validate([
            'name' => 'required|unique:course_groups,name',
            'start_at' => "required|date|after_or_equal:$today_date",
            'course' => 'required',
            'course-begin' => 'required|array',
            'course-end' => 'required|array',
            'course-day' => 'required|array',
        ]);
    }

    private function addGroupTimes($course_group, $days, $begins, $ends)
    {
        for ($i = 0; $i < count($days); $i++){
            $time = Time::create([
                'day' => $days[$i],
                'begin' => $begins[$i],
                'end' => $ends[$i],
            ]);

            // attach time to course group
            $course_group->times()->syncWithoutDetaching($time);
        }
    }
}
