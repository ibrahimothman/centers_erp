<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [];


    public function centers(){
        return $this->belongsTo(Center::class);
    }

    public function instructor(){
        return $this->belongsToMany(Center::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Student::class);
    }

}
