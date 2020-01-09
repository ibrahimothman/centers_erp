<?php

namespace App\Http\Controllers;

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
        $courses=$center->courses;
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
        //dd($request->get('instructor_id'));
        $center = Center::findOrFail(Session('center_id'));
        $course = $center->courses()
            ->create($this->getValidatedCourseData(''));
        $course->instructors()->attach($request->get("instructor_id"));
        $this->uploadImages($request,$course);
        return redirect('courses');
    }

//    public function show(Course $course)
//    {
//        //$courses = Course::all();
//
//
//
//        return view('courses/courseDetails')
//            ->with("course",$course);
//    }

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


    public function edit(Course $course)
    {
        return view('courses/updateCourse')
            ->with("course",$course);
    }



    public function update(Request $request, Course $course)
    {
        // todo handle validation with ajax
        // delete all course's image from db and files
        if($request->hasFile('image')) {
            Image::deleteImages("/uploads/courses", $course->images);
            $course->images()->delete();
        }

        $course->update($this->getValidatedCourseData($course->id));
        $this->uploadImages($request,$course);
        return redirect("courses/$course->id");

    }

    public function uploadImages(Request $request, $course){

        if($request->hasFile('image')) {
            $images = Collection::wrap($request->file('image'));
            foreach ($images as $image) {

                $original = Image::saveImage('/uploads/courses', $image);
                $course->images()->create([
                    'url' => $original
                ]);
            }
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
        $data = request()->validate([
                'name'=>'required|unique:courses,name,'.$course_id,
                'code'=>'required|unique:courses,code,'.$course_id,
                'duration'=>'required',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'description'=>'required',
                'course-chapter'=>'required|array',
                'chapter-desc'=>'required|array'
            ]);

        $data['content'] = $this->setContent($data['course-chapter'], $data['chapter-desc']);
        $data = Arr::except($data,['course-chapter','chapter-desc']);
        return $data;

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
