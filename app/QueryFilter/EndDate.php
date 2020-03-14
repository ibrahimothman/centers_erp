<?php


namespace App\QueryFilter;


use Illuminate\Support\Str;

class EndDate extends Filter
{

    protected function applyFilter($builder)
    {
        return $builder->where('date',"<=", request($this->getClassName()));
    }
}
