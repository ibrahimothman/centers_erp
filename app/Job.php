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


    public function getRolesAttribute($roles)
    {
        return json_decode($roles, true);
    }

    public static function rules(Request $request)
    {
        if($request->isMethod('post')){
            return [
                'name' => ['required', new UniquePerCenter(Job::class, '')],
                'roles' => ['sometimes'],
                'roles.*.scope' => ['required'],
                'roles.*.option' => ['required'],
                'roles.*.isChecked' => ['required'],
            ];
        }else{
            $job_id = $request->route('job')->id;
            return [
                'name' => ['required', new UniquePerCenter(Job::class, $job_id)],
                'roles' => ['sometimes'],
                'roles.*.scope' => ['required'],
                'roles.*.option' => ['required'],
                'roles.*.isChecked' => ['required'],
            ];
        }
    }

    public static $scopes = [
        'الطلاب', 'الامتحانات', 'المدربين', 'الكورسات' , 'الدبلومات', 'الغرف', 'الوظائف', 'الموظفين', 'الماليات'
    ];
}
