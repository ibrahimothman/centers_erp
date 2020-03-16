<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class PaymentModel extends Model
{
    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function instructors()
    {
        return $this->hasMany(Instructor::class);
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function getMetaDataAttribute($key)
    {
//        dd($key);
        return json_decode($key, true);
    }

    public function setMetaDataAttribute($meta_data)
    {
        $newMetaData = [];
        foreach ($meta_data as $key => $value){
            $newMetaData[str::snake($key)] = $value;
        }
        return $newMetaData;
    }
}
