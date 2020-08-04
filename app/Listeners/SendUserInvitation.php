<?php

namespace App\Listeners;


use App\Notifications\InvitationSent;
use Illuminate\Contracts\Queue\ShouldQueue;

use Illuminate\Support\Facades\Notification;

class SendUserInvitation implements ShouldQueue
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {

        Notification::route('mail', $event->invitation->email)
                    ->notify(new InvitationSent($event->invitation->token));
        // Mail::to($event->invitation->email)->send(new Email($event->invitation->token));

    }
}
