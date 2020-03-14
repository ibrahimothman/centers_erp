<?php

namespace App\QueryFilter;
use Closure;

class Sort extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->orderBy('nameEn',request($this->getClassName()));
    }
}
