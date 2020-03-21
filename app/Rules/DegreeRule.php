<?php

namespace App\Rules;

use App\Student;
use Illuminate\Contracts\Validation\Rule;

class DegreeRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        return in_array($value,Student::degreeOptions());
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'valid degrees are : '.implode(',', Student::degreeOptions());
    }
}
