<?php

namespace App\Providers\Stock\Listeners;

use App\Providers\Stock\Events\ProductRunout;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifySeller
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
     * @param  \App\Providers\Stock\Events\ProductRunout  $event
     * @return void
     */
    public function handle(ProductRunout $event)
    {
        //
    }
}
