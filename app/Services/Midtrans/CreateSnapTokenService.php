<?php

namespace App\Services\Midtrans;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Midtrans\Snap;

class CreateSnapTokenService extends Midtrans
{
    protected $order;
    protected $totalPrice;
    public $deliveryCost;
    public $donation;

    public function __construct($order, $totalPrice, $deliveryCost, $donation)
    {
        parent::__construct();

        $this->order = collect($order);
        $this->totalPrice = $totalPrice;
        $this->deliveryCost = $deliveryCost;
        $this->donation = $donation;
    }

    public function getSnapToken()
    {
//        dd($this->donation);
        $params = [
            'transaction_details' => [
                'order_id' => random_int(10000000, 99999999),
                'gross_amount' => $this->totalPrice + $this->deliveryCost,
            ],
            'item_details' => $this->getItems(),
            'customer_details' => [
                'first_name' => Auth::guard('customer')->user()->name,
                'email' => Auth::guard('customer')->user()->email,
                'phone' => Auth::guard('customer')->user()->phone,
            ]
        ];
        $snapToken = Snap::getSnapToken($params);

        return $snapToken;
    }

    public function getItems()
    {
        $delivery = [
            'id' => Str::uuid(),
            'price' => $this->deliveryCost,
            'quantity' => 1,
            'name' => 'Delivery'
        ];

        $donation = [
            'id' => Str::uuid(),
            'price' => $this->donation,
            'quantity' => 1,
            'name' => 'Donation'
        ];
         if($this->donation !== null) {
            return $this->order->push($delivery)->push($donation);
         }else{
             return $this->order->push($delivery);
         }
    }

}
