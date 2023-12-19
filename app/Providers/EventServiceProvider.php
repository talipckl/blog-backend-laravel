<?php

namespace App\Providers;

use App\Events\UserCreateBlogEvent;
use App\Listeners\UserSendBlogListener;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{

    protected $listen = [
//        Registered::class => [
//            SendEmailVerificationNotification::class,
//        ],
        UserCreateBlogEvent::class => [
            UserSendBlogListener::class,
        ]
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
