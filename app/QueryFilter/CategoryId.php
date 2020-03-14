<?php


namespace App\QueryFilter;


class CategoryId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->whereHas('categories', function ($query){
            $query->where($this->getClassName(), request($this->getClassName()));
        });
    }
}
