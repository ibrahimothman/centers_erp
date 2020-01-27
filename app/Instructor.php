<?php

namespace App;

use App\helper\Constants;
use App\QueryFilter\Name;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class Instructor extends Image
{
    protected $hidden = array('pivot');

    protected $guarded = [];

    public static function allInstructors($center)
    {
        return App(Pipeline::class)
            ->send($center->instructors())
            ->through([
                Name::class
            ])
            ->thenReturn()
            ->paginate(5);
    }

    public function getImage($key)
    {
        $imagePath = ($this->$key) ? $this->$key : Constants::getInstructorPlaceholderImage();
        return $imagePath;
    }



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
        $this->deleteImage($this->image);
        $original = $this->saveImage($image);
        return $this->attributes['image'] = url($this->getDir()."/".$original);

    }
    public function setIdImageAttribute($idImage){
        $this->deleteImage($this->idImage);
        $original = $this->saveImage($idImage);
        return $this->attributes['idImage'] = url($this->getDir()."/".$original);

    }

    public static function ApiFields(){
        return ['instructors.id','nameAr','nameEn','image','bio'];
    }


    public function getDir()
    {
        return '/uploads/profiles';
    }
}
