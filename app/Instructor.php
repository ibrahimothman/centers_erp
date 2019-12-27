<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor extends Model
{


    public function instructor_center(){
        return $this->belongsTo(Instructor_center::class);
    }

    public function center(){
        return $this->belongsToMany(Instructor::class);
    }
}
