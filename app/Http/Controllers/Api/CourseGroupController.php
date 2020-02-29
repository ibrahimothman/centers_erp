<?php


namespace App\Http\Controllers\Api;


use App\CourseGroup;
use App\Http\Controllers\Controller;
use App\Course;
use App\Http\Resources\CourseGroup as CourseGroupResource;

class CourseGroupController extends Controller
{

    public function index()
    {
         return CourseGroupResource::collection(CourseGroup::allGroups());
    }


}
