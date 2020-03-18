<?php


namespace App\repository;


use App\Center;

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
            $rest = $center->transactions()->where("meta_data->payFor_type", "App\Instructor")
                ->where("meta_data->payFor_id", "$instructor->id")->latest()->first()['rest'];

            $instructor['rest'] = is_null($rest)? 0 : $rest;
            $instructor['total'] = $instructor->payment_model['salary'] + $instructor['rest']  ;

        }
        return $instructors;
    }

}
