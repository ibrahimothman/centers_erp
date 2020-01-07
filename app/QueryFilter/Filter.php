<?php


namespace App\QueryFilter;


use Closure;

abstract class Filter
{
    public function handle($request, Closure $next)
    {

//        dd(request('sort_by'));
        if(! request()->has(class_basename($this))){
            return $next(...$request);
        }

        $builder = $next(...$request);
        return $this->applyFilter($builder);
    }
    protected abstract function applyFilter($builder);

}
