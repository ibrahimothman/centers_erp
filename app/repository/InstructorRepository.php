<?php


namespace App\repository;


use App\Center;
use App\Instructor;
use App\Room;
use App\Time;
use Illuminate\Support\Arr;

class InstructorRepository
{
    public static $__instance;
    private function __construct(){}

    public static function getInstance()
    {
        if(is_null(self::$__instance)) self::$__instance = new InstructorRepository();
        return self::$__instance;
    }

    public function allInstructors()
    {
        $center = Center::findOrFail(Session('center_id'));
        $instructors = $center->instructors;
        foreach ($instructors as $instructor){

//            $instructor->payment_model = $instructor->getPaymentModelAttribute($instructor->payment_model);

            $rest = $center->transactions()->where("meta_data->payFor_type", "App\Instructor")
                ->where("meta_data->payFor_id", "$instructor->id")->latest()->first()['rest'];

            $instructor['rest'] = is_null($rest)? 0 : $rest;
            $instructor['total'] = $instructor->payment_model['salary'] + $instructor['rest']  ;

        }
        return $instructors;
    }

    public function getAvailableBegins($instructor_id, $day)
    {
        $instructor = Instructor::findOrFail($instructor_id);
        $begin = Time::hours();
        foreach($instructor->busyTimes()->where('day', $day) as $time){
            for ($i = $time->begin; $i < $time->end; $i++){
                $begin= Arr::except($begin,$i);
            }
        }

        return $begin;

    }

    public function getAvailableEnds($instructor_id, $day, $begin)
    {
        $end = Time::hours();
        $instructor = Instructor::findOrFail($instructor_id);

        // Except all times before the time at which you begin
        for ($k = 7; $k <= $begin; $k++) {
            $end = Arr::except($end, $k);
        }
        foreach ($instructor->busyTimes()->where('day', $day) as $time) {
            if ($begin < $time->begin) {
                for ($i = $time->begin + 1; $i <= 24; $i++) {
                    $end = Arr::except($end, $i);
                }
            } else {
                for ($j = $begin; $j >= 7; $j--) {
                    $end = Arr::except($end, $j);
                }
            }

        }


        return $end;

    }

}
