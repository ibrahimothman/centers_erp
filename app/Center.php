<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Center extends Model
{
    protected $guarded = [];

    // once center is created assign user as a creator
    protected static function boot()
    {
        parent::boot();
        static::created(function ($center)
        {
            Auth::user()->centers()->syncWithoutDetaching([
                $center->id => [
                    'job' => 'creator'
                ]
            ]);
        });
    }

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('job');
    }

    public function students()
    {
        return $this->belongsToMany(\App\Student::class)->latest()->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->latest();
    }
}
