<?php

namespace App\Policies;

use App\User;
use App\TestGroup;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestGroupPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any test groups.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
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
        return $testGroup->test->center->users->contains(auth()->user());
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
