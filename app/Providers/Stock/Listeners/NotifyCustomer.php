<?php

namespace App\Providers\Stock\Listeners;

use App\Providers\Stock\Events\ProductAvailable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyCustomer
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
     * @param  \App\Providers\Stock\Events\ProductAvailable  $event
     * @return void
     */
    public function handle(ProductAvailable $event)
    {
        //
    }
}
