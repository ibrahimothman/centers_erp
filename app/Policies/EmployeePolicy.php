<?php

namespace App\Policies;


class EmployeePolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'employees';
    }
}
