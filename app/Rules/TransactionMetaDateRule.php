<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class TransactionMetaDateRule implements Rule
{

    public function passes($attribute, $value)
    {
         dd($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'The validation error message.';
    }
}
