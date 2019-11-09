<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profiles/RwIFWl3VBxNdet3VFZR7eK0PPkQQA5kOo6Q32ZSD.png';
        return '/uploads/' . $imagePath;
    }
    public function degreeOptions(){
        return [
          'طالب','خريج'
        ];
    }

    public function facultyOptions(){
        return [
            'هندسه','تجاره'
        ];
    }

    public function centers()
    {
        return $this->belongsToMany(\App\Center::class)->withTimestamps();
    }

    public function testsEnrolling()
    {
        return $this->belongsToMany(TestGroup::class)->withPivot(['take','result'])->withTimestamps();
    }
}
