<?php

namespace App;

use App\Rules\UniquePerCenter;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Job extends Model
{
    //
    protected $guarded = [];

    public function center()
    {
        return $this->belongsTo(Center::class);
    }

    public function employees()
    {
        return $this->belongsToMany(Employee::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class)->withTimestamps();
    }

    public static function rules(Request $request)
    {
        if($request->isMethod('post')){
            return [
                'name' => ['required', new UniquePerCenter(Job::class, '')],
                'roles' => ['sometimes', 'array']
            ];
        }
    }
}
