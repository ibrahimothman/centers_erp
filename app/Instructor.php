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
        $original = Image::saveImage('/uploads/profiles', $image);
        return $this->attributes['image'] = url("/uploads/profiles/".$original);

    }
    public function setIdImageAttribute($idImage){
        $original = Image::saveImage('/uploads/profiles', $idImage);
        return $this->attributes['idImage'] = url("/uploads/profiles/".$original);

    }



}
