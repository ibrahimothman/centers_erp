<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseReview;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ReviewsApiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $limit =Input::get('limit');
        if ($limit==null)$limit=5;
        $courseId =Input::get('course');
        if ($courseId!=null){
            $course=Course::find($courseId);
            if ($course==null)
                return response()->json(['message'=>'course was not found'],404);
            $reviews=$course->courseReviews()->paginate($limit);
        }else
            $reviews=CourseReview::paginate($limit);

        $reviewsRes=$reviews->toArray();
        $reviewsRes['reviews']=$reviewsRes['data'];
        unset($reviewsRes['data']);
        foreach ($reviews as $i=>$review){
            $reviewsRes['reviews'][$i]['student']=Student::find($review->student_id,Student::ApiFields());
        }



        return response()->json($reviewsRes);
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
