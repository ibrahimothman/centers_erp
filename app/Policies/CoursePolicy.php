<?php

namespace App\Policies;


class CoursePolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'courses';
    }
}
