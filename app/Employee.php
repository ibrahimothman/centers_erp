<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    //
    protected $guarded = [];
    public static function employeeRoles()
    {
        return[
            'admin','not admin'
        ];
    }

    public function address()
    {
        return $this->morphOne(Address::class,'addressable');
    }

    public function centers()
    {
        return $this->belongsToMany(Center::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
