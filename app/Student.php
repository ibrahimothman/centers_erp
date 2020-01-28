<?php

namespace App;

use App\helper\Constants;
use App\helper\ImageUploader;
use App\QueryFilter\Name;
use App\QueryFilter\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class Student extends ImageUploader
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
        $this->deleteImage($this->image);
        $original = $this->saveImage($image);
        return $this->attributes['image'] = url("/uploads/profiles/".$original);

    }
    public function setIdImageAttribute($idImage){
        // first delete prev one
        $this->deleteImage($this->idImage);
        $original = $this->saveImage($idImage);
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

            // detach the student from all centers
            foreach ($student->centers as $center){
                $center->students()->detach($student);
            }
            // delete student's address
            if($student->address) $student->address->delete();
            // delete student's image and id_image from /uploads/profiles
            if($student->image) $this->deleteImage($student->image);
            if($student->idImage) $this->deleteImage($student->idImage);

        });
    }

    public function getDir()
    {
        return '/uploads/profiles';
    }

}
