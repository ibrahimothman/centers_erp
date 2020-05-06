<?php


namespace App\QueryFilter;


use Closure;
use Illuminate\Support\Str;

class Name extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.
        return $builder->get()[0]->nameAr?
            $builder->whereRaw("concat(nameAr, ' ', nameEn) like '%". request($this->getClassName()) ."%' "):
            $builder->whereRaw("name like '%". request($this->getClassName()) ."%' ");

    }
}
