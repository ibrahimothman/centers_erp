<?php


namespace App\QueryFilter;


use Closure;
use Illuminate\Support\Str;

class SearchBy extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.


        return $builder->where(request($this->getClassName()), 'like', '%' . request('value') . '%');

    }
}
