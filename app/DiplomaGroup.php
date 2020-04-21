<?php

namespace App;

use App\Rules\UniquePerCenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class DiplomaGroup extends Model
{
    protected $guarded = [];

    public function diploma()
    {
        return $this->belongsTo(Diploma::class);
    }

    public function instructor()
    {
        return $this->belongsTo(Instructor::class);
    }

    public function students()
    {
        return $this->belongsToMany(Student::class)->withTimestamps();
    }


    public function times()
    {
        return $this->morphToMany(Time::class, 'timeable', 'timeables');
    }



    public static function rules()
    {

        $today_date = Carbon::now()->toDateString();
        return[
            'starts_at' => "required|date|after_or_equal:$today_date",
            'diploma' => 'required',
            'instructor_id' => 'required|integer',
            'diploma-begins' => 'required|array',
            'diploma-ends' => 'required|array',
            'diploma-days' => ['required','array'],
            'diploma-days.*' => ["after_or_equal:$today_date"],
            'diploma-rooms' => ['required','array'],

        ];
    }
}
