<?php

namespace App\Http\Controllers;

use App\Center;
use App\CourseGroupStudents;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CourseEntrollmentsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("courseEnrollment.course_group_show_students");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $center=Center::find(Session("center_id"));
        $student=$center->students;

        $groups=$center->courses;


        return view("courseEnrollment\course_group_enrollment")
            ->with('students',$student)
            ->with('groups',$groups);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //CourseGroupStudents::Create($this->getValidation($request));
        $courseGroupStudents=new CourseGroupStudents();
        $courseGroupStudents->student_id=$request->student_id;
        $courseGroupStudents->group_id=$request->group_id;
        $courseGroupStudents->save;

        return json_encode("student was enrolled successfully ".$courseGroupStudents->student_id);
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

    }

    private function getValidation(Request $request){
        return $this->validate($request,[
        "student_id"=>"required",
        "group_id"=>"required"
        ]);
    }
}
