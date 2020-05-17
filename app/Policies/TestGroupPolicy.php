<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\TestGroup;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TestGroupPolicy
{
    use HandlesAuthorization;


    public function viewAny(User $user)
    {

    }

    /**
     * Determine whether the user can view the test group.
     *
     * @param  \App\User  $user
     * @param  \App\TestGroup  $testGroup
     * @return mixed
     */
    public function view(User $user, TestGroup $testGroup)
    {
        //
        $role = Role::where('name','test-group.view')->first();
        return $testGroup->test->center->users->contains(Auth::user()) && Auth::user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can create test groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
        $role = Role::where('name','test-group.add')->first();
        return auth()->user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can update the test group.
     *
     * @param  \App\User  $user
     * @param  \App\TestGroup  $testGroup
     * @return mixed
     */
    public function update(User $user, TestGroup $testGroup)
    {
        //
        $role = Role::where('name','test-group.update')->first();
        return $testGroup->test->center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can delete the test group.
     *
     * @param  \App\User  $user
     * @param  \App\TestGroup  $testGroup
     * @return mixed
     */
    public function delete(User $user, TestGroup $testGroup)
    {
        //
        $role = Role::where('name','test-group.delete')->first();
        return $testGroup->test->center->users->contains(auth()->user()) && Auth::user()->roles->contains($role->id);
    }

    /**
     * Determine whether the user can restore the test group.
     *
     * @param  \App\User  $user
     * @param  \App\TestGroup  $testGroup
     * @return mixed
     */
    public function restore(User $user, TestGroup $testGroup)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the test group.
     *
     * @param  \App\User  $user
     * @param  \App\TestGroup  $testGroup
     * @return mixed
     */
    public function forceDelete(User $user, TestGroup $testGroup)
    {
        //
    }
}
