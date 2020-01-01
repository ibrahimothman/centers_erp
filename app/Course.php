<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function instructor(){
        return $this->belongsToMany(Center::class);
    }

    public function groups()
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }



}
