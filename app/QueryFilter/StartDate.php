<?php


namespace App\QueryFilter;


use Illuminate\Support\Str;

class StartDate extends Filter
{

    protected function applyFilter($builder)
    {
//        dd("sada");
//        $from = date('2020-03-08');
//        $to = date('2020-03-08');
        return $builder->where('date',">=", request(str::snake(class_basename($this))));
    }
}
