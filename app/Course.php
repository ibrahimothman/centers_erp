<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    public $timestamps = false;
    protected $guarded = [];

    public function courseImages()
    {
        $imagePath = ($this->image) ? $this->image : 'profiles/RwIFWl3VBxNdet3VFZR7eK0PPkQQA5kOo6Q32ZSD.png';
        return '/uploads/profiles/' . $imagePath;
    }

    public function center(){
        return $this->belongsTo(Center::class);
    }

    public function instructor(){
        return $this->belongsToMany(Center::class);
    }

    public function groups()
    {
        return $this->hasMany(CourseGroup::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }





}
