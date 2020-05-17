<?php

namespace App\Policies;

use App\Role;
use App\User;
use App\Test;
use Illuminate\Auth\Access\HandlesAuthorization;
use Illuminate\Support\Facades\Auth;

class TestPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'tests';
    }
}
