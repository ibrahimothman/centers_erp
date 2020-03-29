<?php

namespace App\Rules;

use App\Center;
use App\Course;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Session;

class UniquePerCenter implements Rule
{
    private $attribute;
    private $id;
    private $table;
    private $relation;
    /**
     * @var bool
     */
    private $oneToMany;

    /**
     * Create a new rule instance.
     *
     * @param  $table
     * @param $id
     * @param bool $oneToMany
     * @param $relation
     */
    public function __construct($table, $id, $relation = '', $oneToMany = true)
    {
        //
        $this->id = $id;
        $this->table = $table;
        $this->relation = $relation;
        $this->oneToMany = $oneToMany;
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
        $relation = $this->relation;
        if($this->oneToMany) {
            return $this->table::where('center_id', Session('center_id'))
                ->where($attribute, $value)
                ->where('id', '<>', $this->id)->count() == 0 ? true : false;
        }
        else {
            return Center::findOrFail(Session('center_id'))->$relation
                ->where($attribute, $value)
                ->where('id', '<>', $this->id)->count() == 0 ? true: false;
        }
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
