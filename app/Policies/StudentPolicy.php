<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class StudentPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        $role = Role::where('name','student.view')->first();
        return Auth::user()->roles->contains($role->id);

    }

    /**
     * Determine whether the user can view the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function view(User $user, Student $student)
    {
        /*
         * The user who can view this student must be :
         * A member in center which student enrolled in and
         * Has student.view role
         * */
        $role = Role::where('name','student.view')->first();
        foreach ($student->centers as $center){
            if($center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id))
                return true;
        }
//
        return false;
    }

    /**
     * Determine whether the user can create students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        $role = Role::where('name','student.add')->first();
        return Auth::user()->roles->contains($role->id);

    }

    /**
     * Determine whether the user can update the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function update(User $user, Student $student)
    {
        //
        $role = Role::where('name','student.update')->first();
        foreach ($student->centers as $center){
            if($center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id))
                return true;
        }

        return false;
    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function delete(User $user, Student $student)
    {
        //
        $role = Role::where('name','student.delete')->first();
        return Auth::user()->roles->contains($role->id);

    }

    /**
     * Determine whether the user can restore the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function restore(User $user, Student $student)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function forceDelete(User $user, Student $student)
    {
        //
    }
}
