<?php

namespace App\Listeners;

use App\Employee;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class CreateEmployeeForCenterOwner
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        Employee::create([
            'user_id' => Auth::id(),
            'name' => Auth::user()->name
        ]);
    }
}
