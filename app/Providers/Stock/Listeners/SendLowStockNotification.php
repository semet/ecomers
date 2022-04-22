<?php

namespace App\Providers\Stock\Listeners;

use App\Providers\Stock\Events\ProductAlmostRunout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendLowStockNotification
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
     * @param  \App\Providers\Stock\Events\ProductAlmostRunout  $event
     * @return void
     */
    public function handle(ProductAlmostRunout $event)
    {
        //
    }
}
