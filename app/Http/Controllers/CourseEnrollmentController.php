<?php

namespace App\Http\Controllers;

use App\Center;
use App\Course;
use App\CourseGroup;
use App\QueryFilter\ById;
use App\Student;
use App\Test;
use App\TestGroup;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use mysql_xdevapi\Session;

class CourseEnrollmentController extends Controller
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

        $center = Center::findOrFail(Session('center_id'));
        $courses = $center->courses;
        return view("courseEnrollment.course_group_show_students", compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $center = Center::findOrFail(Session('center_id'));
        $courses = Course::allCourses($center);
        $students=$center->students;
//        echo json_encode($courses);
        return view("courseEnrollment\course_group_enrollment")
            ->with('students',$students)
            ->with('courses',$courses);

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
        if(request()->ajax()){
            $student_id = request()->get('student_id');
            $course_id = request()->get('course_id');
            $group_id = request()->get('group_id');
        }

        if($this->checkCourseEnrollmentValidation($student_id,$course_id)){
            return response('student has already enrolled in this course');
        }
        Student::findOrFail($student_id)->courses()->syncWithoutDetaching($group_id);
        return response('student has successfully enrolled in this course');
//            else{
//                Student::where('nameEn',$stu_name)->courses()->syncWithoutDetaching($group_id);
//                return 'student has successfully enrolled in this test';
//            }

//        return json_encode("student was enrolled successfully ".$courseGroupStudents->student_id);
    }

    // check if a students has already enrolled in a test or not
    public function checkCourseEnrollmentValidation($student_id, $course_id){
        $groups =  Course::findOrFail($course_id)->groups;
        foreach ($groups as $group){
            if($group->joiners->contains($student_id)){
                return true;
            }
        }
        return false;
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
    public function destroy()
    {
//        dd(request()->all());
        $course_group_id = request('course_group_id');
        $student_id = request('student_id');

        CourseGroup::findOrFail($course_group_id)->joiners()->detach($student_id);
        return response('successfully deleted');


    }

    private function getValidation(Request $request){
        return $this->validate($request,[
        "student_id"=>"required",
        "group_id"=>"required"
        ]);
    }

    public function getCourseEnrollments()
    {

        if(request()->ajax()){
            $course_id = request()->get('course_id');
        }
        $center = Center::findOrFail(Session('center_id'));
        $course = $center->courses()->with('groups')->findOrFail($course_id);
        foreach ($course->groups as $group){
            $group->joiners;
        }

        return $course ;

    }
}
