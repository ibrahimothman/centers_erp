<?php


namespace App\QueryFilter;


use Closure;

class ById
{
    public function handle($request, Closure $next)
    {
        if(! request()->has('id')){
            return $next(...$request);
        }
        $builder = $next(...$request);
        return $builder->where('id', request('id'));
    }

}
