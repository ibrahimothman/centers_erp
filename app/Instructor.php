<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{


    protected $guarded = [];

    public function centers(){
        return $this->belongsToMany(Center::class);
    }

    public function courses()
    {
        return $this->hasMany(Course::class);
    }
}
