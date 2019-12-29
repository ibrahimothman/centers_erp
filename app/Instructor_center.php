<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Instructor_center extends Model
{
    public function center(){
        $this->hasMany(Center::class);
    }

    public function instructor(){
        $this->hasMany(Instructor::class);
    }
}
