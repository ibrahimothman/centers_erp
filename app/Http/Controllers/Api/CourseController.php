<?php

namespace App\Http\Controllers\Api;

use App\Category;
use App\Center;
use App\Course;
use App\Http\Resources\Course as CourseResource;
use App\Http\Controllers\Controller;
use App\Instructor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CourseController extends Controller
{
    public function index()
    {
        $courses = Course::allCourses(null);
//        dd(Category::all());
//        return json_encode(Course::whereHas('categories', function ($query){
//            $query->where('category_id', 12);
//        })->paginate(1));
        return CourseResource::collection($courses);
//        return json_encode(Center::find(3)->courses()->where('id', 9));
//        dd(Course::all()->where('id', 9));
//        dd(Course::where("id", 9)->get());
//        return CourseResource::collection($courses);
//        dd($courses->each()->images);
//        $limit =Input::get('limit');
//        if ($limit==null)$limit=5;
//
//        $category_id =Input::get('category');
//        if ($category_id!=null){
//            $category=Category::find($category_id);
//            if ($category==null)
//                return response()->json([]);
//                else
//                    $courses= $category->courses()->paginate($limit);
//        }else{
//            $courses=Course::paginate($limit);
//
//        }
//
//
//        $coursesRes=$courses->toArray();
//        $coursesRes['courses']=$coursesRes['data'];
//        unset($coursesRes['data']);
//        foreach ($courses as $j=>$course){
//            $coursesRes['courses'][$j]['instructors']=$course->instructors()->get(Instructor::ApiFields());
//            $coursesRes['courses'][$j]['center']=$course->center()->first(Center::$ApiFields);
//            $coursesRes['courses'][$j]['categories']=$course->categories;
//        }
//
//
//
//        return response()->json($coursesRes,200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
        //
    }
}
