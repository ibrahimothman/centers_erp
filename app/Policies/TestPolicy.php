<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\Test;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TestPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any tests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
        $role = Role::where('name','test.view')->first();
        return auth()->user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can view the test.
     *
     * @param  \App\User  $user
     * @param  \App\Test  $test
     * @return mixed
     */
    public function view(User $user, Test $test)
    {
        /*
         * user has rights to view a test if :
         * he is a member in the center which has this test and
         * he has test.view rights
         * */
//        $role = Role::where('name','test.view')->first();
        return Auth::id() == $test->center->user_id;
    }

    /**
     * Determine whether the user can create tests.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
//        $role = Role::where('name','test.add')->first();
        return Auth::user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can update the test.
     *
     * @param  \App\User  $user
     * @param  \App\Test  $test
     * @return mixed
     */
    public function update(User $user, Test $test)
    {
        //
        $role = Role::where('name','test.update')->first();
        return $test->center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id);

    }

    /**
     * Determine whether the user can delete the test.
     *
     * @param  \App\User  $user
     * @param  \App\Test  $test
     * @return mixed
     */
    public function delete(User $user, Test $test)
    {
        //
        $role = Role::where('name','test.delete')->first();
        return $test->center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id);

    }

    /**
     * Determine whether the user can restore the test.
     *
     * @param  \App\User  $user
     * @param  \App\Test  $test
     * @return mixed
     */
    public function restore(User $user, Test $test)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the test.
     *
     * @param  \App\User  $user
     * @param  \App\Test  $test
     * @return mixed
     */
    public function forceDelete(User $user, Test $test)
    {
        //
    }
}
