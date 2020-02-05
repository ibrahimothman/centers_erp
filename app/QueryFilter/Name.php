<?php


namespace App\QueryFilter;


use Closure;
use Illuminate\Support\Str;

class Name extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where('nameAr','like', '%' . request('name') . '%');
    }
}
