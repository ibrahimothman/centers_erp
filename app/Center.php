<?php

namespace App;

use App\Events\NewCenterHasCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Center extends Model
{
    protected $guarded = [];
    public static $ApiFields=['id','name'];
    // once center is created save it in session
    protected static function boot()
    {
        parent::boot();
        static::created(function ($center)
        {
            Session(['center_id' => $center->id]);
//            dd(Center::findOrFail(Session('center_id')));
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

    public function diplomas()
    {
        return $this->hasMany(Diploma::class);
    }

    public function instructors(){
        return $this->belongsToMany(Instructor::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class)->latest();
    }

}
