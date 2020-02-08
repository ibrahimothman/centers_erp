<?php


namespace App\helper;


class SideBarLinks
{
    public static $baseUrl = 'http://127.0.0.1:8000/';
    public static function studentLinks ()
    {
        return [
            self::$baseUrl.'students/create' =>'تسجيل الطلاب',
            self::$baseUrl.'students' => 'عرض/تعديل بيانات الطلاب'
        ];
    }

    public static function testLinks()
    {
        return[
            self::$baseUrl.'tests/create' => 'اضافه بيانات الامتحانات',
            self::$baseUrl.'tests' => 'عرض/تعديل بيانات الامتحانات',
            self::$baseUrl.'test-groups/create' => 'تسجيل الامتحانات',
            self::$baseUrl.'test-groups' => 'عرض مواعيد المتحانات',
            self::$baseUrl.'test-enrollments/create' => 'تسجيل الطلاب علي المتحانات',
            self::$baseUrl.'test-enrollments' => 'عرض الطلاب المسجلين',
            self::$baseUrl.'test-takes/create' => 'تسجيل حضور الامتحان',
            self::$baseUrl.'test-results/create' => 'تسجيل نتيجة الامتحان',
            self::$baseUrl.'test-results' => 'نتيجة الامتحانات',
            self::$baseUrl.'test-statements/create' => 'اضافه افاده',
        ];
    }

    public static function courseLinks()
    {
        return[
            self::$baseUrl.'courses/create' => 'اضافه بيانات الكورس',
            self::$baseUrl.'courses' => 'عرض/تعديل بيانات الكورسات',
            self::$baseUrl.'course_groups/create' => 'تسجيل مواعيد الكورسات',
            self::$baseUrl.'course_groups' => 'عرض مواعيد الكورسات',
            self::$baseUrl.'course_enrollment/create' => 'تسجيل الطلاب علي الكورسات',
            self::$baseUrl.'course_enrollment' => 'عرض الطلاب المسجلين',
        ];
    }

    public static function diplomaLinks()
    {
        return[
            self::$baseUrl.'diplomas/create' => 'اضافه بيانات الدبلومات',
            self::$baseUrl.'diplomas' => 'عرض/تعديل بيانات الدبلومات',
            self::$baseUrl.'diploma-groups/create' => 'تسجيل مواعيد الدبلومات',
            self::$baseUrl.'diploma-groups' => 'عرض مواعيد الدبلومات',
            self::$baseUrl.'diploma-enrollments/create' => 'تسجيل الطلاب علي الدبلومات',
            self::$baseUrl.'diploma-enrollments' => 'عرض الطلاب المسجلين',

        ];
    }

    public static function instructorLinks()
    {
        return[
            self::$baseUrl.'instructors/create' => 'اضافه بيانات المدرب',
            self::$baseUrl.'instructors' => 'عرض/تعديل بيانات المدرب',

        ];
    }

    public static function RoomLinks()
    {
        return[
            self::$baseUrl.'rooms/create' => 'اضافه غرفه جديده',
            self::$baseUrl.'rooms' => 'عرض/تعديل بيانات الغرف',
        ];
    }

    public static function CalendarLinks()
    {
        return[
            self::$baseUrl.'calendar' => 'عرض ال calendar',

        ];
    }



    public static function employeeLinks()
    {
        return [
            self::$baseUrl.'employees/create' =>'تسجيل موظف',
            self::$baseUrl.'employees' => 'عرض/تعديل بيانات موظف'
        ];
    }

    public static function jobLinks()
    {
        return [
            self::$baseUrl.'jobs/create' =>'تسجيل وظيفة جديده',
            self::$baseUrl.'jobs' => 'عرض/تعديل بيانات الوظيفه'
        ];
    }

}
