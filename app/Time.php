<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Time extends Model
{
    //

    protected $guarded = [];

    public function course_groups()
    {
        return $this->belongsToMany(CourseGroup::class);
    }

    public function getDayAttribute($value)
    {
        return self::days()[$value];
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
}
