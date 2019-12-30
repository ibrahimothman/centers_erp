<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Student extends Model
{
    protected $guarded = [];

    public function profileImage()
    {
        $imagePath = ($this->image) ? $this->image : 'profiles/RwIFWl3VBxNdet3VFZR7eK0PPkQQA5kOo6Q32ZSD.png';
        return '/uploads/profiles/' . $imagePath;
    }

    // save image before center it to db
    public function setImageAttribute($image){
        if(! is_dir(public_path('/uploads/profiles'))){
            mkdir(public_path('/uploads/profiles'));
        }
        $basename = Str::random();
        $original = $basename.'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/uploads/profiles'), $original);

        $this->attributes['image'] = $original;
//        dd($image);
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

    public function courses()
    {
        return $this->belongsToMany(Course::class)->withTimestamps();
    }
}
