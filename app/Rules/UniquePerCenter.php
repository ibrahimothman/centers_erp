<?php

namespace App\Rules;

use App\Course;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class UniquePerCenter implements Rule
{
    private $id;
    private $table;
    private $attribute;

    /**
     * Create a new rule instance.
     *
     * @param  $table
     * @param $id
     */
    public function __construct($table, $id)
    {
        //
        $this->id = $id;

        $this->table = $table;
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
        $this->attribute = $attribute;
        return $this->table::where('center_id', Session('center_id'))
                    ->where($attribute, $value)
                    ->where('id' , '<>', $this->id)->count() == 0? true: false;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return "This $this->attribute is already taken";
    }
}
