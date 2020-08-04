<?php

namespace App\Policies;


class JobPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'jobs';
    }
}
