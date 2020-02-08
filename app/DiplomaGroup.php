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

    public function instructors()
    {
        return $this->belongsToMany(Instructor::class)->withTimestamps();
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
