<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        Order\Events\OrderPlaced::class => [
            Order\Listeners\SendThankYouEmail::class,
            Order\Listeners\SendNotificationToSeller::class,
            Order\Listeners\SendNotificationToAdmin::class,
        ],
        Stock\Events\ProductAlmostRunout::class => [
            Stock\Listeners\SendLowStockNotification::class,
        ],
        Stock\Events\ProductRunout::class => [
            Stock\Listeners\SendRunoutStockNotification::class,
        ],
        Stock\Events\ProductAvailable::class => [
            Stock\Listeners\NotifyCustomer::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
