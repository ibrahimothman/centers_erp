<?php

namespace App\Events;

use App\Invitation;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;

class NewInvitationHasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    /**
     * @var Invitation
     */
    public $invitation;

    /**
     * Create a new event instance.
     *
     * @param Invitation $invitation
     */
    public function __construct(Invitation $invitation)
    {
        $this->invitation = $invitation;
    }

}
