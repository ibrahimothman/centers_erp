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

    public function setRolesAttribute($roles)
    {
        return $this->attributes['roles'] = json_encode($roles, JSON_UNESCAPED_UNICODE);
    }

    public function getRolesAttribute($roles)
    {
        return json_decode($roles, true);
    }

    public static function rules(Request $request)
    {
        if($request->isMethod('post')){
            return [
                'name' => ['required', new UniquePerCenter(Job::class, '')],
                'roles' => ['sometimes', 'array'],
                'roles.*.scope' => ['required'],
                'roles.*.value' => ['required'],
            ];
        }
    }
}
