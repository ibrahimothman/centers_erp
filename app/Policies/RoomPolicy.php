<?php

namespace App\Policies;


class RoomPolicy extends Policy
{

    public function getScope()
    {
        // TODO: Implement getScope() method.
        return 'rooms';
    }
}
