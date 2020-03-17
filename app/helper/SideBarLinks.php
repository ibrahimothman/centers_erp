<?php


namespace App\helper;


class SideBarLinks
{
    public static function studentLinks ()
    {
        return [
            env('APP_URL', '').'/'.'students/create' =>'تسجيل الطلاب',
            env('APP_URL', '').'/'.'students' => 'عرض/تعديل بيانات الطلاب'
        ];
    }

    public static function testLinks()
    {
        return[
            env('APP_URL', '').'/'.'tests/create' => 'اضافه بيانات الامتحانات',
            env('APP_URL', '').'/'.'tests' => 'عرض/تعديل بيانات الامتحانات',
            env('APP_URL', '').'/'.'test-groups/create' => 'تسجيل الامتحانات',
            env('APP_URL', '').'/'.'test-groups' => 'عرض مواعيد المتحانات',
            env('APP_URL', '').'/'.'test-enrollments/create' => 'تسجيل الطلاب علي المتحانات',
            env('APP_URL', '').'/'.'test-enrollments' => 'عرض الطلاب المسجلين',
            env('APP_URL', '').'/'.'test-takes/create' => 'تسجيل حضور الامتحان',
            env('APP_URL', '').'/'.'test-results/create' => 'تسجيل نتيجة الامتحان',
            env('APP_URL', '').'/'.'test-results' => 'نتيجة الامتحانات',
            env('APP_URL', '').'/'.'test-statements/create' => 'اضافه افاده',
        ];
    }

    public static function courseLinks()
    {
        return[
            env('APP_URL', '').'/'.'courses/create' => 'اضافه بيانات الكورس',
            env('APP_URL', '').'/'.'courses' => 'عرض/تعديل بيانات الكورسات',
//            env('APP_URL', '').'/'.'course_groups/create' => 'تسجيل مواعيد الكورسات',
//            env('APP_URL', '').'/'.'course_groups' => 'عرض مواعيد الكورسات',
//            env('APP_URL', '').'/'.'course_enrollment/create' => 'تسجيل الطلاب علي الكورسات',
//            env('APP_URL', '').'/'.'course_enrollment' => 'عرض الطلاب المسجلين',
        ];
    }

    public static function diplomaLinks()
    {
        return[
            env('APP_URL', '').'/'.'diplomas/create' => 'اضافه بيانات الدبلومات',
            env('APP_URL', '').'/'.'diplomas' => 'عرض/تعديل بيانات الدبلومات',
            env('APP_URL', '').'/'.'diploma-groups/create' => 'تسجيل مواعيد الدبلومات',
            env('APP_URL', '').'/'.'diploma-groups' => 'عرض مواعيد الدبلومات',
            env('APP_URL', '').'/'.'diploma-enrollments/create' => 'تسجيل الطلاب علي الدبلومات',
            env('APP_URL', '').'/'.'diploma-enrollments' => 'عرض الطلاب المسجلين',

        ];
    }

    public static function instructorLinks()
    {
        return[
            env('APP_URL', '').'/'.'instructors/create' => 'اضافه بيانات المدرب',
           env('APP_URL', '').'/'.'instructors' => 'عرض/تعديل بيانات المدرب',

        ];
    }

    public static function RoomLinks()
    {
        return[
            env('APP_URL', '').'/'.'rooms/create' => 'اضافه غرفه جديده',
           env('APP_URL', '').'/'.'rooms' => 'عرض/تعديل بيانات الغرف',
        ];
    }

    public static function CalendarLinks()
    {
        return[
            env('APP_URL', '').'/'.'calendar' => 'عرض ال calendar',

        ];
    }



    public static function employeeLinks()
    {
        return [
           env('APP_URL', '').'/'.'employees/create' =>'تسجيل موظف',
            env('APP_URL', '').'/'.'employees' => 'عرض/تعديل بيانات موظف'
        ];
    }

    public static function jobLinks()
    {
        return [
           env('APP_URL', '').'/'.'jobs/create' =>'تسجيل وظيفة جديده',
           env('APP_URL', '').'/'.'jobs' => 'عرض/تعديل بيانات الوظيفه'
        ];
    }

    public static function financeLinks()
    {
        return [
            env('APP_URL', '').'/'.'dept' =>'dept',
            env('APP_URL', '').'/'.'finance' => 'finance management',
            env('APP_URL', '').'/'.'expenses/create' => 'expenses',
            env('APP_URL', '').'/'.'profits' => 'profit',
            env('APP_URL', '').'/'.'revenues/create' => 'revenues',
        ];
    }

}
