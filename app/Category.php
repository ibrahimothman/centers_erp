<?php

namespace App;

use App\QueryFilter\CategoryId;
use App\QueryFilter\Id;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Category extends Model
{
    protected $hidden = array('pivot');

    protected $guarded = [];

    public static function allCategories($center)
    {
        return app(Pipeline::class)
            ->send($center ? $center->categories() : Category::query())
            ->through([
                Id::class,

            ])
            ->thenReturn()
            ->paginate(request('limit')? request('limit') : 10);
    }

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

    // get children and sub children of the category
    public function getChildrenIds()
    {
        $ids = [$this->id];
        foreach ($this->children as $child){
            $ids = array_merge($ids, $child->getChildrenIds());
        }

        return $ids;
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function courses(){
        return $this->morphedByMany(Course::class, 'categorical', 'categorical');
    }

    public function tests()
    {
        return $this->morphedByMany(Test::class, 'categorical', 'categorical');
    }

}
