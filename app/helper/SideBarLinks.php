<?php


namespace App\helper;


class SideBarLinks
{
    public static function studentLinks ()
    {
        return [
            url('/').'/'.'students/create' =>'تسجيل الطلاب',
            url('/').'/'.'students' => 'عرض/تعديل بيانات الطلاب'
        ];
    }

    public static function testLinks()
    {
        return[
            url('/').'/'.'tests/create' => 'اضافه بيانات الامتحانات',
            url('/').'/'.'tests' => 'عرض/تعديل بيانات الامتحانات',
            url('/').'/'.'test-groups/create' => 'تسجيل الامتحانات',
            url('/').'/'.'test-groups' => 'عرض مواعيد المتحانات',
            url('/').'/'.'test-enrollments/create' => 'تسجيل الطلاب علي المتحانات',
            url('/').'/'.'test-enrollments' => 'عرض الطلاب المسجلين',
            url('/').'/'.'test-takes/create' => 'تسجيل حضور الامتحان',
            url('/').'/'.'test-results/create' => 'تسجيل نتيجة الامتحان',
            url('/').'/'.'test-results' => 'نتيجة الامتحانات',
            url('/').'/'.'test-statements/create' => 'اضافه افاده',
        ];
    }

    public static function courseLinks()
    {
        return[
            url('/').'/'.'courses/create' => 'اضافه بيانات الكورس',
            url('/').'/'.'courses' => 'عرض/تعديل بيانات الكورسات',
//            url('/').'/'.'course_groups/create' => 'تسجيل مواعيد الكورسات',
//            url('/').'/'.'course_groups' => 'عرض مواعيد الكورسات',
//            url('/').'/'.'course_enrollment/create' => 'تسجيل الطلاب علي الكورسات',
//            url('/').'/'.'course_enrollment' => 'عرض الطلاب المسجلين',
        ];
    }

    public static function diplomaLinks()
    {
        return[
            url('/').'/'.'diplomas/create' => 'اضافه بيانات الدبلومات',
            url('/').'/'.'diplomas' => 'عرض/تعديل بيانات الدبلومات',
            url('/').'/'.'diploma-groups/create' => 'تسجيل مواعيد الدبلومات',
            url('/').'/'.'diploma-groups' => 'عرض مواعيد الدبلومات',
            url('/').'/'.'diploma-enrollments/create' => 'تسجيل الطلاب علي الدبلومات',
            url('/').'/'.'diploma-enrollments' => 'عرض الطلاب المسجلين',

        ];
    }
    public static function categoryLinks()
    {
        return [
            url('/').'/'.'categories' => 'التصنيفات',
        ];
    }

    public static function instructorLinks()
    {
        return[
            url('/').'/'.'instructors/create' => 'اضافه بيانات المدرب',
           url('/').'/'.'instructors' => 'عرض/تعديل بيانات المدرب',

        ];
    }

    public static function RoomLinks()
    {
        return[
            url('/').'/'.'rooms/create' => 'اضافه غرفه جديده',
           url('/').'/'.'rooms' => 'عرض/تعديل بيانات الغرف',

        ];
    }

    public static function CalendarLinks()
    {
        return[
            url('/').'/'.'calendar' => 'عرض ال calendar',

        ];
    }



    public static function employeeLinks()
    {
        return [
           url('/').'/'.'employees/create' =>'تسجيل موظف',
            url('/').'/'.'employees' => 'عرض/تعديل بيانات موظف'
        ];
    }

    public static function jobLinks()
    {
        return [
           url('/').'/'.'jobs/create' =>'تسجيل وظيفة جديده',
           url('/').'/'.'jobs' => 'عرض/تعديل بيانات الوظيفه'
        ];
    }

    public static function financeLinks()
    {
        return [
            url('/').'/'.'finance' => 'عرض ملخص الماليات',
            url('/').'/'.'expenses/create' => 'المصاريف',
            url('/').'/'.'salaries/create' => 'المرتبات',
            url('/').'/'.'revenues/create' => 'الايرادات',
            url('/').'/'.'refund/create' => 'استرجاع',

        ];
    }

    public static function settingLinks()
    {
        return [
            url('/').'/'.'settings' =>'الاعدادات',
//            url('/').'/'.'centers/options' => 'امكانيات الغرف',

        ];
    }

}
