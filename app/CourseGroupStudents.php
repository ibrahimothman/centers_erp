<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CourseGroupStudents extends Model
{
       protected $guarded = [];
        protected $table = 'course_groups_students';

       public function students(){
           $this->hasMany(Student::class);
       }

    public function groups(){
        return $this->hasMany(Student::class);
    }
}
