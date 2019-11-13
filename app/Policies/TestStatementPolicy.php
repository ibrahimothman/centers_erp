<?php

namespace App\Policies;

use App\User;
use App\TestStatement;
use Illuminate\Auth\Access\HandlesAuthorization;

class TestStatementPolicy
{
    use HandlesAuthorization;

    /**
     * Determine whether the user can view any test statements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function viewAny(User $user)
    {
        //
    }

    /**
     * Determine whether the user can view the test statement.
     *
     * @param  \App\User  $user
     * @param  \App\TestStatement  $testStatement
     * @return mixed
     */
    public function view(User $user, TestStatement $testStatement)
    {
        return $testStatement->test->center->users->contains(auth()->user());
    }

    /**
     * Determine whether the user can create test statements.
     *
     * @param  \App\User  $user
     * @return mixed
     */
    public function create(User $user)
    {
        //
    }

    /**
     * Determine whether the user can update the test statement.
     *
     * @param  \App\User  $user
     * @param  \App\TestStatement  $testStatement
     * @return mixed
     */
    public function update(User $user, TestStatement $testStatement)
    {
        //
    }

    /**
     * Determine whether the user can delete the test statement.
     *
     * @param  \App\User  $user
     * @param  \App\TestStatement  $testStatement
     * @return mixed
     */
    public function delete(User $user, TestStatement $testStatement)
    {
        //
    }

    /**
     * Determine whether the user can restore the test statement.
     *
     * @param  \App\User  $user
     * @param  \App\TestStatement  $testStatement
     * @return mixed
     */
    public function restore(User $user, TestStatement $testStatement)
    {
        //
    }

    /**
     * Determine whether the user can permanently delete the test statement.
     *
     * @param  \App\User  $user
     * @param  \App\TestStatement  $testStatement
     * @return mixed
     */
    public function forceDelete(User $user, TestStatement $testStatement)
    {
        //
    }
}
