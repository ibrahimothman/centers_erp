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
}
