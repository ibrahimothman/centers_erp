<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Course;
use App\CourseGroup;
use App\Student;
use App\Test;
use App\TestGroup;
use App\CourseGroupStudents;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use mysql_xdevapi\Session;

class CourseEnrollmentController extends Controller
{

    public function index()
    {

        $courses = $this->center->courses;
        return view("courseEnrollment.course_group_show_students", compact('courses'));
    }


    public function create()
    {

        $courses = Course::allCourses($this->center);
        $students=$this->center->students;


        return view("courseEnrollment/course_group_enrollment")
            ->with('students',$students)
            ->with('courses',$courses);

    }


    public function store(Request $request)
    {
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



    public function destroy()
    {
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

        $course = $this->center->courses()->with('groups')->findOrFail($course_id);
        foreach ($course->groups as $group){
            $group->joiners;
        }

        return $course ;

    }
}
