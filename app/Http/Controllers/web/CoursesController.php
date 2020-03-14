<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Course;
use App\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use Illuminate\Support\Str;
use mysql_xdevapi\Session;

class CoursesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $center = Center::findOrFail(Session('center_id'));
        $courses=Course::allCourses($center);
        return view('courses/viewCourses')
            ->with('courses',$courses);
    }


    public function create()
    {
        $center=Center::findOrFail(Session("center_id"));
        $instructors= $center->instructors;
        return view('courses/addCourse')
            ->with('instructors',$instructors);


    }

    public function store(Request $request)
    {
//        dd($request->all());
        $center = Center::findOrFail(Session('center_id'));

        $data = $this->getValidatedCourseData('');
        $course_data = Arr::except($data,['images','instructors']);

        // create the course
        $course = $center->courses()->create($course_data);

        // attach the course to the instructors
        foreach ($data['instructors'] as $instructor_id){
            $course->instructors()->syncWithoutDetaching($instructor_id);
        }

        // upload images
        $this->uploadImages($request,$course);
        return $course;
    }


    public function show( $id)
    {
        $course=Course::find($id);
        $center=Center::find(Session("center_id"));
        if ($course==null)
            abort(404,"Course was not found");
        return view('courses/courseDetails')
            ->with("course",$course)
            ->with("center",$center);
    }


    public function edit($id )
    {
        $center=Center::findOrFail(Session("center_id"));
        $instructors= $center->instructors;
        $course=Course::find($id);
        if ($course==null)
            abort(404,"Course was not found");
        return view('courses/updateCourse')
            ->with("course",$course)
            ->with("instructors",$instructors);
    }



    public function update(Request $request, Course $course)
    {
        dd($request->all());
        // todo handle validation with ajax
        // delete all course's image from db and files
        if($request->hasFile('image')) {
            Image::deleteImages("/uploads/courses", $course->images);
            $course->images()->delete();
        }

        $data = $this->getValidatedCourseData('');
        $course_data = Arr::except($data,['images','instructors']);

        $course->update($course_data);

        $this->uploadImages($request,$course);
        return redirect("courses/$course->id");

    }

    public function uploadImages(Request $request, $course){

        if($request->hasFile('images')) {
//            dd(Collection::wrap($request->file('images')));
            $course->uploadImages(Collection::wrap($request->file('images')));

        }

    }


    public function destroy(Course $course)
    {
        //delete course's images from file
        Image::deleteImages('/uploads/courses',$course->images);
        //delete course's images from db
        $course->images()->delete();
//        //delete course
        $course->delete();
        return redirect("/courses");
    }

    private function getValidatedCourseData($course_id){
        return request()->validate([
                'name'=>'required|unique:courses,name,'.$course_id,
                'code'=>'required|unique:courses,code,'.$course_id,
                'duration'=>'required',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'description'=>'required',
                'content'=>'required',
                'images'=>'required|array',
                'instructors'=>'required|array',
            ]);


    }

    private function setContent($course_chapters, $chapters_description){
        $content = array();
        for ($i = 0; $i < count($course_chapters); $i++){
            $temp = array();
            $temp['name'] = $course_chapters[$i];
            $temp['description'] = $chapters_description[$i];

            $content[] = $temp;
        }

        return json_encode($content);
    }
}
