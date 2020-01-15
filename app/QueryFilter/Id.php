<?php

namespace App\QueryFilter;
use Closure;
use Illuminate\Support\Str;

class Id extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where(str::snake(class_basename($this)), request(str::snake(class_basename($this))));
    }
}
