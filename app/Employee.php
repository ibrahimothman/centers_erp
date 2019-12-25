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

    public function centers()
    {
        return $this->belongsToMany(Center::class);
    }

    public function jobs()
    {
        return $this->belongsToMany(Job::class);
    }
}
