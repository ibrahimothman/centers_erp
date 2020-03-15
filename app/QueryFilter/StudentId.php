<?php


namespace App\QueryFilter;


use App\CourseGroup;

class StudentId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->whereHas('joiners', function ($query){
            $query->where($this->getClassName(), request($this->getClassName()));
        });
    }
}
