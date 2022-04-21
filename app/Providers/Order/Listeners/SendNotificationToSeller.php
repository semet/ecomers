<?php

namespace App\Providers\Order\Listeners;

use App\Models\OrderProduct;
use App\Providers\Order\Events\OrderPlaced;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class SendNotificationToSeller
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
     * @param  \App\Providers\Order\Events\OrderPlaced  $event
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $store = OrderProduct::where('order_id', Auth::guard('customer')->user()->orders->first()->id)
            ->with('product')
            ->get()
            ->groupBy('product.store.email')
            ->toArray();
        foreach (array_keys($store) as $email) {
            Log::info('sending emil to '. $email);
        }
    }
}
