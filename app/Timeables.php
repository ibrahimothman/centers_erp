<?php


namespace App;


use Illuminate\Database\Eloquent\Relations\MorphPivot;

class Timeables extends MorphPivot
{
    public function room()
    {
        return $this->belongsTo(Room::class, 'room_id');
    }
}
