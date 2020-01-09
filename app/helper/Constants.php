<?php
namespace App\helper;
Class Constants{
private $instructor_placeholder_image="https://www.nautec.com/wp-content/uploads/2018/04/placeholder-person.png";
private $course_placeholder_image="https://i1.wp.com/alaakriedy.net/wp-content/uploads/2016/05/placeholder.png?ssl=1";

    /**
     * @return string
     */
    public function getInstructorPlaceholderImage(): string
    {
        return $this->instructor_placeholder_image;
    }

    /**
     * @return string
     */
    public function getCoursePlaceholderImage(): string
    {
        return $this->course_placeholder_image;
    }

    public static function getDefaultErrorMessage(){
        return "Oops Something went wrong";
    }







}





?>
