<?php


namespace App\QueryFilter;




use Illuminate\Support\Str;

class CourseId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where($this->getClassName(), request($this->getClassName()));
    }
}
