<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseReview extends Model
{
    protected $hidden = array('pivot');

    public function courses(){
        return $this->belongsTo(Course::class);
    }
}
