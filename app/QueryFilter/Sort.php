<?php


namespace App\QueryFilter;


use Closure;

class Sort
{

    public function handle($request, Closure $next)
    {

        if(! request()->has('sort')){
            return $next($request);
        }

        $builder = $next(...$request);
        return $builder->orderBy(request('sort_by'),request('sort'));
    }

}
