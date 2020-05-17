<?php

namespace App\Policies;

use App\helper\AccessRightsHelper;

use Illuminate\Auth\Access\HandlesAuthorization;


abstract class Policy
{
    use HandlesAuthorization;

    public abstract function getScope();

    public function viewAny()
    {
        return AccessRightsHelper::show($this->getScope());
    }


    public function view()
    {
        return AccessRightsHelper::show($this->getScope());
    }


    public function create()
    {
        return AccessRightsHelper::create($this->getScope());
    }


    public function update()
    {
        //
        return AccessRightsHelper::update($this->getScope());

    }

    public function delete()
    {
        //
        return AccessRightsHelper::delete($this->getScope());

    }


    public function restore(User $user, Student $student)
    {
        //
    }

    public function forceDelete(User $user, Student $student)
    {
        //
    }
}
