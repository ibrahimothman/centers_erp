<?php

namespace App\QueryFilter;
use Closure;

class Sort extends Filter
{

//    public function handle($request, Closure $next)
//    {
//        if(! request()->has('sort')){
//            return $next($request);
//        }
//
//        $builder = $next(...$request);
//    }


    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->orderBy('nameAr',request('sort'));
    }
}
