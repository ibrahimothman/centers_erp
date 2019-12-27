<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function students()
    {
        return $this->belongsToMany(\App\Student::class)->latest()->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->latest();
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function instructor(){
        return $this->belongsToMany(Instructor::class);
    }

//    public function instructor_center(){
//        return $this->belongsTo(Instructor_center::class);
//    }
}
