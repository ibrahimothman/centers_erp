<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewCenterHasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;
    private $center;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($center)
    {
        $this->center = $center;
    }


}
