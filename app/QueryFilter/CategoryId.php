<?php


namespace App\QueryFilter;


use App\Category;
use App\Course;

class CategoryId extends Filter
{

    protected function applyFilter($builder)
    {
        // TODO: Implement applyFilter() method.

        return $builder->whereHas('categories', function ($query){
            $query
                ->whereIn($this->getClassName(),
                    Category::find(request($this->getClassName()))? Category::find(request($this->getClassName()))->getChildrenIds(): []);
        });
    }
}
