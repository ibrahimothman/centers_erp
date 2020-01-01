<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseGroup extends Model
{
    //
    protected $guarded = [];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function CourseGroupStudents(){
        return $this->belongsToMany(CourseGroupStudents::class);
    }
}
