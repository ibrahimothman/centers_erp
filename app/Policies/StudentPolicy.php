<?php

namespace App\Policies;


class StudentPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'students';
    }
}
