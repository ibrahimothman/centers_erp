<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class CourseMedia extends Model
{
    public $timestamps = false;

    public function courses(){
        $this->hasMany(Course::class);
    }

    public function uploadImage(Request $request){
        $file = Input::file('images');
        $imageName = time().'.'.$file->getClientOriginalExtension();
        return $file->move(public_path('uploads'), $imageName);
    }

}
