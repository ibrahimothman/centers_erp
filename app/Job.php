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

    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function employees()
    {
        return $this->hasMany(Employee::class);
    }

    public function invitations()
    {
        return $this->belongsToMany(Invitation::class)->withTimestamps();
    }

    public function setRolesAttribute($roles)
    {

        $newRoles = [];
        foreach ($roles as $role){
            $role['scope'] = $this->setRoleScopeOptions()[$role['scope']];
            $newRoles[] = $role;
        }
        return $this->attributes['roles'] = json_encode($newRoles, JSON_UNESCAPED_UNICODE);
    }

    private function setRoleScopeOptions()
    {
        return[
            'الطلاب' => 'students',
            'الامتحانات' => 'tests',
            'المدربين' => 'instructors',
            'الماليات' => 'finance',
            'الكورسات' => 'courses',
            'الدبلومات' => 'diplomas',
        ];
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

    public static $scopes = [
        'الطلاب', 'الامتحانات', 'المدربين', 'الكورسات' , 'الدبلومات', 'الماليات'
    ];
}
