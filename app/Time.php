<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //

    protected $guarded = [];

    public function diploma_groups()
    {
        return $this->morphedByMany(DiplomaGroup::class, 'timeable');
    }

    public function rooms()
    {
        return $this->belongsToMany(Room::class, 'timeables')->withTimestamps();
    }



    public static function days()
    {
        return [
          1 => 'السبت',
          2 => 'الاحد',
          3 => 'الاتنين',
          4 => 'الثلاثاء',
          5 => 'الاربعاء',
          6 => 'الخميس',
          7 => 'الجمعه',

        ];
    }

    public static function hours()
    {
        return[
            7 => "07:00",
            8 => "08:00",
            9 => "09:00",
            10 => "10:00",
            11 => "11:00",
            12 => "12:00",
            13 => "13:00",
            14 => "14:00",
            15 => "15:00",
            16 => "16:00",
            17 => "17:00",
            18 => "18:00",
            19 => "19:00",
            20 => "20:00",
            21 => "21:00",
            22 => "22:00",
            23 => "23:00",
            24 => "24:00",
        ];
    }

    public static function addTimes($days, $begins, $ends)
    {
        $times = array();
        for ($i = 0; $i < count($days); $i++){
            $time = Time::firstOrCreate([
                'day' => $days[$i],
                'begin' => $begins[$i],
                'end' => $ends[$i],
                'busy' => 1,

            ]);

            $times[] = $time;
        }
        return $times;
    }
}
