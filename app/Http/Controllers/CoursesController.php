<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Psy\Exception\Exception;
use Illuminate\Support\Facades\Session;
class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

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
        $instructors= Session::get('center');
        dd($instructors);

        //echo Auth::user()->center->courses;
        return view('courses/addCourse')
            ->with('',$instructors);


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $course = Course::create($this->getValidation($request));
        $course->update(['center_id' => Session('center_id')]);
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

        //$request['instructor_id']=(int)$request['instructor_id']['0'];
        //$request['center_id']=Auth::user()->center->id;
        //echo(print_r( $request));
        // todo handle validation with ajax
        //$this->getValidation($request);

        //$course = Course::find($id);
        //$course->content="test update";
        //$course->save();
        //$course->Update($request);
        //Course::where('id', $id)->update($request->all());


        $course->update($this->getValidation($request));
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


        $validate=$this->getValidation($request);
        Course::create($validate);



        return json_encode( "course added successfully");
    }

    private function getValidation(Request $request){
        $request['instructor_id']=(int)$request['instructor_id']['0'];
        $request['center_id']=Session('center_id');
        return $this->validate($request,
            ['name'=>'required',
                'code'=>'required',
                'duration'=>'required',
                'cost'=>'required',
                'teamCost'=>'nullable',
                'instructor_id'=>'required',
                'center_id'=>'required',
                'description'=>'required',
                'content'=>'required'
            ]);

    }
}
