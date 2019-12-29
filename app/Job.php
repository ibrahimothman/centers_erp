<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    //
    protected $guarded = [];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }
}
