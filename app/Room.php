<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $guarded = [];

    public function getDetailsAttribute($key)
    {
        return json_decode($key,true);
    }


    public function getExtrasAttribute($extras)
    {
        return json_decode($extras, true);
    }


    public function setExtrasAttribute($value)
    {
        return $this->attributes['extras'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'timeables');
    }

    public function course_groups()
    {
        return $this->belongsToMany(CourseGroup::class)->withTimestamps();
    }

    public function test_groups()
    {
        return $this->belongsToMany(TestGroup::class)->withTimestamps();
    }

    public function diplomas()
    {
        return $this->hasMany(DiplomaGroup::class);
    }
}
