<?php


namespace App\QueryFilter;


use Closure;

class Name extends Filter
{
    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where('nameAr','like', '%' . request('name') . '%')
            ->orWhere('nameEn','like', '%' . request('name') . '%');

    }
}
