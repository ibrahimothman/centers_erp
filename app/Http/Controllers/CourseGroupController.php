<?php

namespace App\Http\Controllers;

use App\Center;
use App\Course;
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
//        dd($request->all());
        // fetch validated date
        $data = $this->validateCourseGroup();
        // fetch center from session
        $center = Center::findOrFail(Session('center_id'));
        // create a new course group
        $course_group = $center->courses()->findOrFail($data['course'])->groups()->create([
            'name' => $data['name'],
            'start_at' => $data['start_at'],
        ]);
        dd($course_group);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        return view('courseGroups/course_group_students');
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
        return request()->validate([
            'name' => 'required|unique:course_groups,name',
            'start_at' => 'required|date',
            'course' => 'required',
        ]);
    }
}
