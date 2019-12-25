<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateAdminJobForNewCenter
{

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        // create admin job for a center
        $event->center->jobs()->create([
            'name' => 'admin'
        ]);
    }
}
