<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $hidden = array('pivot');

    protected $guarded = [];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function children()
    {
        return $this->hasMany(Category::class, 'parent_id')->with('children');
    }

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
