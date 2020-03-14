<?php


namespace App\QueryFilter;


class TestId extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->where('test_id', request($this->getClassName()));
    }
}
