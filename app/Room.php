<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    //
    protected $guarded = [];

    public function getDetailsAttribute($key)
    {
        return json_decode($key,true);
    }

    public function getExtrasAttribute($key)
    {
        return json_decode($key,true);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
