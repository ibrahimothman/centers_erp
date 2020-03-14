<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Arr;

class TransactionMetaDateRule implements Rule
{

    public function passes($attribute, $value)
    {
        /*
         * value is an array includes:
         * account, date, amount, ,meta_data
         * */
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
