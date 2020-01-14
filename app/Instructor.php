<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Instructor extends Model
{


    protected $guarded = [];

    public function centers(){
        return $this->belongsToMany(Center::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class);
    }
    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    // save image before center it to db
    public function setImageAttribute($image){

        if(! is_dir(public_path('/uploads/profiles'))){
            mkdir(public_path('/uploads/profiles'),0777,true);
        }
        $this->uploadImage($image,'image');

    }
    public function setImageIdAttribute($idImage){
        if(! is_dir(public_path('/uploads/profiles'))){
            mkdir(public_path('/uploads/profiles'),0777,true);
        }
        $this->uploadImage($idImage,'idImage');

    }

    public function getImageIdAttribute($idImage){
        if(! is_dir(public_path('/uploads/profiles'))){
            mkdir(public_path('/uploads/profiles'),0777,true);
        }
        $this->uploadImage($idImage,'idImage');

    }


        private function uploadImage($image,$key){
            $basename = Str::random();
            $original = $basename.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/uploads/profiles'), $original);
            return $this->attributes[$key] = public_path('/uploads/profiles').$original;

    }

}
