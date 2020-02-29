<?php

namespace App;

use App\QueryFilter\CourseId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class CourseGroup extends Model
{
    //
    protected $guarded = [];

    public static function allGroups()
    {
        return app(Pipeline::class)
            ->send(CourseGroup::all())
            ->through([
                CourseId::class,
            ])
            ->thenReturn();
    }

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class)->withTimestamps();
    }


    public function joiners()
    {
        return $this->belongsToMany(Student::class);
    }

}
