<?php

namespace App;

use App\QueryFilter\Id;
use App\QueryFilter\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Test extends Model
{
    protected $guarded  = [];
    protected $appends = ['groups'];

    public static function allTests($center)
    {
        return app(Pipeline::class)
            ->send($center->tests()->with('groups.enrollers'))
            ->through([
                Id::class,
                Sort::class
            ])
            ->thenReturn()
            ->paginate(5);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);

    }

    public function groups()
    {
        return $this->hasMany(TestGroup::class)->with('times');

    }

    public function getGroupsAttribute()
    {
        return $this->groups()->get()->each(function ($group){
            $group['available_seats'] = $group->available_chairs - $group->enrollers->count();
        });
    }

    public function categories()
    {
        return $this->morphToMany(Category::class, 'categorical', 'categorical');
    }
    public function statement()
    {
        return $this->hasOne(TestStatement::class);
    }

}
