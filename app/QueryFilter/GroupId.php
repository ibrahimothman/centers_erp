<?php


namespace App\QueryFilter;


class GroupId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
//        dd($builder);
        return $builder->where('diploma_group_id', request($this->getClassName()));
    }
}
