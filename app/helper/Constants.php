<?php
namespace App\helper;
Class Constants{
private static $instructor_placeholder_image="https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png";
private static $course_placeholder_image="https://i1.wp.com/alaakriedy.net/wp-content/uploads/2016/05/placeholder.png?ssl=1";

    /**
     * @return string
     */
    public static function getInstructorPlaceholderImage(): string
    {
        return self::$instructor_placeholder_image;
    }

    /**
     * @return string
     */
    public static function getCoursePlaceholderImage(): string
    {
        return self::$course_placeholder_image;
    }

    public static function getDefaultErrorMessage(){
        return "Oops Something went wrong";
    }







}





?>
