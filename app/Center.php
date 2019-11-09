<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    protected $guarded = [];

    public function students()
    {
        return $this->belongsToMany(\App\Student::class)->latest()->withTimestamps();
    }

    public function tests()
    {
        return $this->hasMany(Test::class)->latest();
    }
}
