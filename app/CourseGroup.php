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

    public function times()
    {
        return $this->belongsToMany(Time::class);
    }


    public function joiners(){
        return $this->belongsToMany(Student::class);

    }
}
