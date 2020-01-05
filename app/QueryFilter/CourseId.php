<?php


namespace App\QueryFilter;


use App\Course;
use Closure;

class CourseId
{
    public function handle($request, Closure $next)
    {
        if(! request()->has('course_id')){
            return $next(...$request);
        }
        $builder = $next(...$request);
        return $builder->where('id', request('course_id'));
    }

}
