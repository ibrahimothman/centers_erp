<?php

namespace App\Http\Controllers\web;

use App\Http\Controllers\Controller;

use App\Center;
use App\Course;
use App\Image;
use App\repository\CategoryRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;

use Illuminate\Support\Facades\Validator;


class CoursesController extends Controller
{


    public function index()
    {

        $this->authorize('viewAny', Course::class);
        $courses=Course::allCourses($this->center);
        return view('courses/viewCourses')
            ->with('courses',$courses);
    }


    public function create()
    {

        $this->authorize('create', Course::class);
        $instructors= $this->center->instructors;
        $categories = CategoryRepository::getInstance()->allCategories();
        return view('courses/addCourse', compact('instructors', 'categories'));


    }

    public function store(Request $request)
    {
        $this->authorize('create', Course::class);
        $data = $this->getValidatedCourseData($request);
        if($data->fails()){
            return response()->json(['message' => 'invalid data', 'errors' => $data->errors()->messages()], 400);
        }

        // create the course
        $course_data = Arr::except($data->validate(),['images','instructors', 'categories']);
        $course = $this->center->courses()->create($course_data);

        // attach the course to the instructors
        $course->instructors()->sync($request->all()['instructors']);


        // attach the course to the categories
        $course->categories()->sync($request->all()['categories']);


        // upload images
        $this->uploadImages($request,$course);
        return response()->json(['message' => 'Successfully added the course', 'course_id' => $course->id],200);
    }


    public function show( $id)
    {
        $this->authorize('create', Course::class);
        $course=Course::find($id);
        if ($course==null)
            abort(404,"Course was not found");
        return view('courses/courseDetails')
            ->with("course",$course)
            ->with("center",$this->center);
    }


    public function edit($id )
    {
        $this->authorize('update', Course::class);
        $instructors= $this->center->instructors;
        $course=Course::find($id);
        if ($course==null)
            abort(404,"Course was not found");
        return view('courses/updateCourse')
            ->with("course",$course)
            ->with("instructors",$instructors);
    }



    public function update(Request $request, Course $course)
    {
        $this->authorize('update', Course::class);
       // todo handle validation with ajax
        // delete all course's image from db and files
        if($request->hasFile('image')) {
            Image::deleteImages("/uploads/courses", $course->images);
            $course->images()->delete();
        }

        $data = $this->getValidatedCourseData($request);
        if($data->fails()){
            return response()->json(['message' => 'invalid data', 'errors' => $data->errors()->messages()], 400);
        }
        $course_data = Arr::except($data->validate(),['images','instructors']);

        $course->update($course_data);

        // update instructors
        if(isset($request->all()['instructors'])) {
            $course->instructors()->sync($request->all()['instructors']);
        }

        $this->uploadImages($request,$course);
        return $course;

    }

    public function uploadImages(Request $request, $course){

        if($request->hasFile('images')) {
            $course->uploadImages(Collection::wrap($request->file('images')));

        }

    }


    public function destroy(Course $course)
    {
        $this->authorize('delete', Course::class);
        //delete course
        $course->delete();
        return response()->json(['message' => 'deleted'], 200);
    }

    private function getValidatedCourseData(Request $request){
        return Validator::make($request->all(),Course::rules($request));
    }


}
