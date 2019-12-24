<?php


namespace App\helper;


class SideBarLinks
{
//    public  $baseUrl = 'http://127.0.0.1:8000/';
    public static function studentLinks ()
    {
        return [
            'http://127.0.0.1:8000/'.'students/create' =>'تسجيل الطلاب',
            'http://127.0.0.1:8000/'.'students' => 'عرض/تعديل بيانات الطلاب'
        ];
    }

    public static function testLinks()
    {
        return[
            'http://127.0.0.1:8000/tests/create' => 'اضافه بيانات الامتحانات',
            'http://127.0.0.1:8000/tests' => 'عرض/تعديل بيانات الامتحانات',
            'http://127.0.0.1:8000/test-groups/create' => 'تسجيل الامتحانات',
            'http://127.0.0.1:8000/test-groups' => 'عرض مواعيد المتحانات',
            'http://127.0.0.1:8000/test-enrollments/create' => 'تسجيل الطلاب علي المتحانات',
            'http://127.0.0.1:8000/test-enrollments' => 'عرض الطلاب المسجلين',
            'http://127.0.0.1:8000/test-takes/create' => 'تسجيل حضور الامتحان',
            'http://127.0.0.1:8000/test-results/create' => 'تسجيل نتيجة الامتحان',
            'http://127.0.0.1:8000/test-results' => 'نتيجة الامتحانات',
            'http://127.0.0.1:8000//test-statements/create' => 'اضافه افاده',
        ];
    }

    public static function employeeLinks()
    {
        return [
            'http://127.0.0.1:8000/'.'employees/create' =>'تسجيل موظف',
            'http://127.0.0.1:8000/'.'employees' => 'عرض/تعديل بيانات موظف'
        ];
    }

}
