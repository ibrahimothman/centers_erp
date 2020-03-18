<?php


namespace App\repository;


use App\Center;

class EmployeeRepository
{
    public static $__instance;
    private function __construct(){}

    public static function getInstance()
    {
        if(is_null(self::$__instance)) self::$__instance = new EmployeeRepository();
        return self::$__instance;
    }

    public function allEmployees()
    {
        $center = Center::findOrFail(Session('center_id'));
        $employees = $center->employees;
        foreach ($employees as $employee){
            $rest = $center->transactions()->where("meta_data->payFor_type", "App\Employee")
                ->where("meta_data->payFor_id", "$employee->id")->latest()->first()['rest'];

            $employee['rest'] = is_null($rest)? 0 : $rest;
            $employee['total'] = $employee->payment_model['salary'] + $employee['rest']  ;

        }
        return $employees;
    }

}
