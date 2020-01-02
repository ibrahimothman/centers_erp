<?php

namespace App;

use App\Events\NewCenterHasCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Center extends Model
{
    protected $guarded = [];

    // once center is created save it in session
    protected static function boot()
    {
        parent::boot();
        static::created(function ($center)
        {
            Session(['center_id' => $center->id]);
        });
    }

    public function owner()
    {
        return $this->belongsTo(User::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function jobs()
    {
        return $this->hasMany(Job::class);
    }

    public function students()
    {
        return $this->belongsToMany(\App\Student::class)->latest()->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->latest();
    }

    public function courses(){
        return $this->hasMany(Course::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

}
