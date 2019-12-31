<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $guarded = [];

    public function jobs()
    {
        return $this->belongsToMany(Job::class)->withTimestamps();
    }





}
