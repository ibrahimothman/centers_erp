<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DiplomaGroup extends Model
{
    protected $guarded = [];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

//    public function rooms()
//    {
//        return $this->belongsToMany(Room::class, 'timeables');
//    }

    public function times()
    {
        return $this->morphToMany(Time::class, 'timeable', 'timeables');
    }
}
