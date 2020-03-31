<?php

namespace App\Providers;

use App\Events\NewCenterHasCreated;
use App\Events\NewInvitationHasCreated;
use App\Listeners\CreateAdminJobForNewCenter;
use App\Listeners\CreateEmployeeForCenterOwner;
use App\Listeners\LogVerifiedUser;
use App\Listeners\SendUserInvitation;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        NewInvitationHasCreated::class => [
            SendUserInvitation::class,
        ],

    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
