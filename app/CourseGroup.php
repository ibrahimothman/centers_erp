<?php

namespace App;

use App\QueryFilter\CourseId;
use App\QueryFilter\StudentId;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class CourseGroup extends Model
{
    //
    protected $guarded = [];

    public static function allGroups()
    {
        return app(Pipeline::class)
            ->send(CourseGroup::query())
            ->through([
                CourseId::class,
                StudentId::class,
            ])
            ->thenReturn()->paginate(request('limit')? request('limit'): 10 );
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
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

}
