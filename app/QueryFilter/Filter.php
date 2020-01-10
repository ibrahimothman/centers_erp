<?php


namespace App\QueryFilter;


use Closure;
use Illuminate\Support\Str;

abstract class Filter
{
    public function handle($request, Closure $next)
    {
        if(! request()->has(str::snake(class_basename($this)))){
            return $next($request);
        }

        $builder = $next(...$request);
        return $this->applyFilter($builder);
    }
    protected abstract function applyFilter($builder);

}
