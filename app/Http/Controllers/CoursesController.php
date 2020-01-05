<?php

namespace App\Http\Controllers;

use App\Center;
use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;

use Illuminate\Support\Str;
use mysql_xdevapi\Session;

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
        $center = Center::findOrFail(Session('center_id'));
        $courses=$center->courses;

//        dd(Course::with('images')->get());
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
        $center=Center::findOrFail(Session("center_id"));
        $instructors= $center->instructor;
        //echo Auth::user()->center->courses;
        return view('courses/addCourse')
            ->with('instructors',$instructors);


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
        $center = Center::findOrFail(Session('center_id'));
        $course = $center->courses()->create($this->getValidation($request));
        $this->uploadImages($request,$course);
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
//        return view('courses/viewCourses', compact('courses'));
//        echo json_encode($course);
        return view('courses/courseDetails', compact('course'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
//        $instructors= Auth::user()->center->instructor;
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
        // todo handle validation with ajax
        $course->update($this->getValidation($request));
        return json_encode( "course successfully updated ");

    }

    public function uploadImages(Request $request, $course){

        // create courses dir if not existed
        if(! is_dir(public_path('/uploads/courses'))){
            mkdir(public_path('/uploads/courses'));
        }

        // fetch images from request and wrap them into collection
        $images = Collection::wrap($request->file('image'));

        // loop through images, move it to courses dir then save it into db
        $images->each(function ($image) use ($course){
            $basename = Str::random();
            $original = $basename.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/courses'), $original);
            $course->images()->create([
                'url' => $original
            ]);
        });

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Course::where('id',$id)->delete();
        return redirect("/courses");
    }

    private function getValidation(Request $request){

        $request['instructor_id']=(int)$request['instructor_id']['0'];
        $request['center_id']=Session('center_id');
        return $this->validate($request,
            ['name'=>'required|unique:courses,name',
                'code'=>'required|unique:courses,code',
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
