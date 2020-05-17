<?php

namespace App\QueryFilter;
use Closure;

class Sort extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
//        dd(request($this->getClassName()));
        return $builder->orderBy(request('order_by'),request($this->getClassName()));

    }
}
