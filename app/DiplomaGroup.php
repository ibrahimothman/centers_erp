<?php

namespace App;

use App\QueryFilter\DiplomaId;
use App\QueryFilter\Id;
use App\Rules\UniquePerCenter;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;

class DiplomaGroup extends Model
{
    protected $guarded = [];

    public static function allEnrollments($diplomasIds)
    {
        return app(Pipeline::class)
            ->send(DiplomaGroup::with('students')->with('diploma')->whereIn('diploma_id', $diplomasIds))
            ->through([
                DiplomaId::class,
                Id::class
            ])
            ->thenReturn()->get();
    }

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

//    public function rooms()
//    {
//        return $this->morphToMany(Room::class, 'timeable', 'timeables');
//    }

    public function times()
    {
        return $this->morphToMany(Time::class, 'timeable', 'timeables')
            ->withPivot('room_id');

    }



    public static function rules(Request $request)
    {

        $today_date = Carbon::now()->toDateString();
        if($request->isMethod('post')) {
            return [
                'starts_at' => "required|date|after_or_equal:$today_date",
                'diploma' => 'required',
                'instructor_id' => 'required|integer',
                'diploma-begins' => 'required|array',
                'diploma-ends' => 'required|array',
                'diploma-days' => ['required', 'array'],
                'diploma-days.*' => ["date", "after_or_equal:starts_at"],
                'diploma-rooms' => ['required', 'array'],

            ];
        }
        else{
            $group = $request->route('diploma_group');
            return [
                'starts_at' => ["required","date",function($date) use($today_date, $group){
                    if($date != $group->starts_at){
                        return $date >= $today_date;
                    }else return true;
                }],
                'diploma' => 'required',
                'instructor_id' => 'required|integer',
                'diploma-begins' => 'required|array',
                'diploma-ends' => 'required|array',
                'diploma-days' => ['required', 'array'],
                'diploma-days.*' => ["date", "after_or_equal:starts_at"],
                'diploma-rooms' => ['required', 'array'],
            ];
        }

    }
}
