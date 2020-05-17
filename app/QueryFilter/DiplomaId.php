<?php


namespace App\QueryFilter;


class DiplomaId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->where('diploma_id', request($this->getClassName()));
    }
}
