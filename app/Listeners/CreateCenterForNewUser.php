<?php

namespace App\Listeners;

use App\Center;

class CreateCenterForNewUser
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // create default center the new registered user
        Center::create([
            'user_id' => $event->user->id
        ]);
    }
}
