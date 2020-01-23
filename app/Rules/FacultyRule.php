<?php

namespace App\Rules;

use App\Student;
use Illuminate\Contracts\Validation\Rule;

class FacultyRule implements Rule
{


    public function passes($attribute, $value)
    {
        //
        return in_array($value,Student::facultyOptions());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'valid Faculties are : '.implode(',', Student::facultyOptions());
    }
}
