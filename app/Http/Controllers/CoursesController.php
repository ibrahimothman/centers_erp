<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Psy\Exception\Exception;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index()
    {
        $courses=Course::all();

        return view('courses/viewCourses')
            ->with('courses',$courses);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
//        $instructors= Auth::user()->center->instructor;

        //echo Auth::user()->center->courses;
        return view('courses/addCourse');


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Course::create($this->getValidation());
//
        return json_encode( "course added successfully");

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
//        $courses = Course::all();
//        return view('courses/viewCourses', compact('courses'));
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
//        $instructors= Auth::user()->center->instructor;
        $course= Course::first();
        return view('courses/updateCourse')
            ->with("course",$course);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        $course->update($this->getValidation());
        return json_encode( "course successfully updated ");

    }

    public function uploadImage(Request $request){
        $file = Input::file('images');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        return $file->move(public_path('uploads'), $imageName);
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

    public function createCourse(Request $request){

        //echo $request->input('instructor_id');
        $request['instructor_id']=(int)$request['instructor_id']['0'];
        $request['center_id']=Auth::user()->center->id;

        Course::create($this->getValidation());

        return json_encode( "course added successfully");
    }

    private function getValidation(){
        return request()->validate([
                'name'=>'required',
                'code'=>'required',
                'duration'=>'required|regex:/^[0-9]+$/',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'instructor_id'=>'required',
                'center_id'=>'required',
                'description'=>'required',
                'content'=>'required'
            ]);


//
    }
}
