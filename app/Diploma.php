<?php

namespace App;

use App\helper\ImageUploader;
use App\QueryFilter\Id;
use App\QueryFilter\Sort;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pipeline\Pipeline;
use phpDocumentor\Reflection\Types\Self_;

class Diploma extends ImageUploader
{

    protected $guarded = [];
    protected $appends = ['groups'];

    public static function allDiplomas($center)
    {
        return app(Pipeline::class)
            ->send($center->diplomas()->with('courses.instructors'))
            ->through([
                Id::class,
                Sort::class
            ])
            ->thenReturn()->get();
    }


    public function setImageAttribute($image)
    {
        $this->deleteImage($this->image);
        $origin = $this->saveImage($image);
        $this->attributes['image'] = url($this->getDir()."/".$origin);
    }

    public function getGroupsAttribute()
    {
        return $this->groups()->get()->each(function ($group){
            $group['available_seats'] = $group->available_chairs - $group->students->count();

        });
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function groups()
    {
        return $this->hasMany(DiplomaGroup::class);
    }

    public function instructors()
    {
        $instructors = [];
        foreach ($this->courses()->with('instructors')->get() as $course){
            foreach ($course->instructors as $instructor){
                $instructors[] = $instructor;
            }
        }
        return collect(array_unique($instructors));
    }

    public function payments()
    {
        return $this->morphMany(Transaction::class, 'payFor');
    }

    public function getDir()
    {
        return '/uploads/diplomas';
    }

    protected static function boot()
    {
        parent::boot(); // TODO: Change the autogenerated stub
        static::deleting(function ($diploma){
            if($diploma->image) (new self)->deleteImage($diploma->image);
        });
    }
}
