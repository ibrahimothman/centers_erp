<?php

namespace App;

use App\helper\ImageUploader;
use Illuminate\Database\Eloquent\Model;

class Diploma extends ImageUploader
{

    protected $guarded = [];


    public function setImageAttribute($image)
    {
        $this->deleteImage($this->image);
        $origin = $this->saveImage($image);
        $this->attributes['image'] = url($this->getDir()."/".$origin);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }

    public function getDir()
    {
        return '/uploads/diplomas';
    }
}
