<?php

namespace App;

use App\Events\NewCenterHasCreated;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use mysql_xdevapi\Session;

class Center extends Model
{
    protected $guarded = [];

    // once center is created assign user as a creator
    protected static function boot()
    {
        parent::boot();
        static::created(function ($center)
        {
            // create employee record for center's creator
            $employee = Employee::create([
                'user_id' => Auth::id(),
                'name' => Auth::user()->name
            ]);

            // add employee to center
            $employee->centers()->syncWithoutDetaching($center);

            // create new admin job related to this center
            $job = $center->jobs()->create([
                'name' => 'admin'
            ]);

            // add admin job to center's creator
            $employee->jobs()->syncWithoutDetaching($job);

            // save center_id in session
            Session(['center' => $center]);

        });
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

    public function instructor(){
        return $this->belongsToMany(Instructor::class);
    }

//    public function instructor_center(){
//        return $this->belongsTo(Instructor_center::class);
//    }
}
