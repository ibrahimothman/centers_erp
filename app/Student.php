<?php

namespace App;

use App\helper\Constants;
use App\QueryFilter\Name;
use App\QueryFilter\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Str;

class Student extends Model
{
    protected $guarded = [];

    public static function allStudents($center)
    {
        return app(Pipeline::class)
            ->send($center->students())
            ->through([
                Sort::class,
                Name::class
            ])
            ->thenReturn()
            ->get();

    }

    public function getImage($key)
    {
        $imagePath = ($this->$key) ? $this->$key : Constants::getInstructorPlaceholderImage();
        return  $imagePath;
    }

    public function setImageAttribute($image){
        $original = Image::saveImage('/uploads/profiles', $image);
        return $this->attributes['image'] = url("/uploads/profiles/".$original);

    }
    public function setIdImageAttribute($idImage){
        $original = Image::saveImage('/uploads/profiles', $idImage);
        return $this->attributes['idImage'] = url("/uploads/profiles/".$original);

    }



    public static function degreeOptions(){
        return [
          'طالب','خريج'
        ];
    }

    public static function facultyOptions(){
        return [
            'هندسه','تجاره'
        ];
    }

    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function centers()
    {
        return $this->belongsToMany(\App\Center::class)->withTimestamps();
    }

    public function testsEnrolling()
    {
        return $this->belongsToMany(TestGroup::class)->withPivot(['take','result'])->withTimestamps();
    }


    public function courses(){
        return $this->belongsToMany(CourseGroup::class);
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($student){
            if($student->address) $student->address->delete();

        });
    }
}
