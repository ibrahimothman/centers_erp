<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Room extends Model
{
    //
    protected $guarded = [];

    public function getDetailsAttribute($key)
    {
        return json_decode($key,true);
    }


    public function getExtrasAttribute($extras)
    {
        return json_decode($extras, true);
    }


    public function setExtrasAttribute($value)
    {
        return $this->attributes['extras'] = json_encode($value, JSON_UNESCAPED_UNICODE);
    }

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'timeables');
    }

    public function course_groups()
    {
        return $this->belongsToMany(CourseGroup::class)->withTimestamps();
    }

    // get tests'times for the room
    public function test_groups()
    {
        $times =  DB::table('timeables')
            ->join('times', 'times.id', '=', 'timeables.time_id')
            ->where('timeables.room_id', '=', $this->id)
            ->where('timeables.timeable_type', '=', 'App\TestGroup')
            ->join('test_groups', 'test_groups.id', '=', 'timeables.timeable_id')
            ->select('timeable_id', 'day', 'test_id')
            ->get();

        return $times->map(function ($item){
            $temp['title'] = Test::findOrFail($item->test_id)->name;
            $temp['start'] = $item->day;
            $temp['end'] = $item->day;
            return $temp;
        })->toArray();

    }

    // get diplomas'times for the room
    public function diplomas()
    {
        $times =  DB::table('timeables')
            ->join('times', 'times.id', '=', 'timeables.time_id')
            ->where('timeables.room_id', '=', $this->id)
            ->where('timeables.timeable_type', '=', 'App\DiplomaGroup')
            ->join('diploma_groups', 'diploma_groups.id', '=', 'timeables.timeable_id')
            ->select('timeable_id', 'day', 'diploma_id')
            ->get();

        return $times->map(function ($item){
            $temp['title'] = Diploma::findOrFail($item->diploma_id)->name;
            $temp['start'] = $item->day;
            $temp['end'] = $item->day;
            return $temp;
        })->toArray();
    }
}
