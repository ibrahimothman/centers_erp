<?php

namespace App\Policies;

use App\helper\AccessRightsHelper;
use App\Role;
use App\User;
use App\Student;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class StudentPolicy
{
    use HandlesAuthorization;
    private $scope = 'students';

    /**
     * Determine whether the user can view any students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny()
    {
        return AccessRightsHelper::show($this->scope);
    }

    /**
     * Determine whether the user can view the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function view()
    {
        return AccessRightsHelper::show($this->scope);
    }

    /**
     * Determine whether the user can create students.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create()
    {
        return AccessRightsHelper::create($this->scope);
    }

    /**
     * Determine whether the user can update the student.
     *
     * @param  \App\User  $user
     * @param  \App\Student  $student
     * @return mixed
     */
    public function update()
    {
        //
        return AccessRightsHelper::update($this->scope);

    }

    /**
     * Determine whether the user can delete the student.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function delete()
    {
        //
        return AccessRightsHelper::delete($this->scope);

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
