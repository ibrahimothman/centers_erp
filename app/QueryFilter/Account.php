<?php


namespace App\QueryFilter;

use Illuminate\Support\Str;

class Account extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where(str::snake(class_basename($this)), request(str::snake(class_basename($this))));
    }
}
