<?php

namespace App;

use App\QueryFilter\ById;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public static function allCourses($center)
    {
        return app(Pipeline::class)
            ->send($center->courses)
            ->through([
                ById::class
            ])
            ->thenReturn()
            ->get();
    }

    public function courseImages()
    {
        $imagePath = ($this->image) ? $this->image : 'profiles/RwIFWl3VBxNdet3VFZR7eK0PPkQQA5kOo6Q32ZSD.png';
        return '/uploads/profiles/' . $imagePath;
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function groups()
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }


    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function($course){
            if($course->images) $course->images()->delete();
        });
    }


}
