<?php

namespace App\Policies;


class InstructorPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'instructors';
    }
}
