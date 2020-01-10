<?php


namespace App\QueryFilter;


use Closure;
use Illuminate\Support\Str;

class Name
{

    public function handle($request, Closure $next)
    {
        if(! request()->has(str::snake(class_basename($this)))){
            return $next($request);
        }

        $builder = $next($request);
        return $builder->where('nameAr','like', '%' . request('name') . '%')
            ->orWhere('nameEn','like', '%' . request('name') . '%')->get();
    }

}
