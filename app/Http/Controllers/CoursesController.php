<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseMedia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CoursesController extends Controller
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
        $this->validate($request,
            ['name'=>'required',
            'code'=>'required',
            'duration'=>'required|regex:/^[0-9]+$/',
            'price'=>'required',
            'description'=>'required',
            'content'=>'required'
        ]);

        $course=new Course();
        $course->name=request('name');
        $course->code=request('code');
        $course->duration=request('duration');
        $course->cost=request('price');
        $course->description=request('description');
        $course->content=request('content');
        $course->save();
        $res=$this->uploadImage($request);
        if ($res!=null){
           $courseMedia=new CourseMedia();
           $courseMedia->src=$res->getRealPath();
           $courseMedia->course_id =$course->id;
           $courseMedia->save();
        }

            return redirect('courses/create')
                ->with("message","course added successfully");


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
}
