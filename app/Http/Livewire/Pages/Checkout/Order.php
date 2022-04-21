<?php

namespace App\Http\Livewire\Pages\Checkout;

use App\Models\Donation;
use App\Models\OrderDetail;
use App\Models\OrderProduct;
use App\Providers\Order\Events\OrderPlaced;
use App\Services\CartService;
use App\Services\Midtrans\CreateSnapTokenService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class Order extends Component
{
    public $items;

    public $totalPrice;

    public $deliveryCost;

    public $grossAmount;

    public $addressLine;

    public $isReadyForPayment;

    public $orderId;

    public $donation;

    protected $listeners = [
        'deliveryServiceUpdated' => 'updateDeliveryFee',
        'cartUpdated' => 'updateItems',
        'addressSelected' => 'setAddressLine'
    ];

    public function render()
    {
        return view('livewire.pages.checkout.order');
    }

    public function mount()
    {
        $this->items = CartService::getItems();
        $this->totalPrice = CartService::totalPrice();
        $this->deliveryCost = Session::get('deliveryDetails') ? Session::get('deliveryDetails')['cost'] : null;
        $this->isReadyForPayment = false;

        $this->grossAmount = $this->donation === null ? $this->totalPrice + $this->deliveryCost : $this->totalPrice + $this->deliveryCost + $this->donation;

    }


    public function handlePayment()
    {
        if(!$this->isReadyForPayment){
            $this->dispatchBrowserEvent('notReadyForPayment');
            return;
        }
        $midtrans = new CreateSnapTokenService($this->items, $this->totalPrice, $this->deliveryCost, $this->donation);
        $snapToken = $midtrans->getSnapToken();
        $this->dispatchBrowserEvent('snapTokenGenerated', ['snapToken' => $snapToken]);
    }


    public function saveOrder($response, $token)
    {
        $this->saveOrderToDatabase($response, $token)
            ->saveOrderItems()
            ->saveOrderDetails($response)
            ->clearCart();
    }

    public function saveOrderToDatabase($response, $token)
    {
        $paymentStatus = 0;

        if($response['transaction_status'] === 'capture' || $response['transaction_status'] === 'settlement'){
            $paymentStatus = 2;
        }elseif($response['transaction_status'] === 'pending'){
            $paymentStatus = 1;
        }
         $order = new \App\Models\Order();
         $order->order_number = $response['order_id'];
         $order->customer_id = Auth::guard('customer')->id();
         $order->total_price = $response['gross_amount'];
         $order->payment_status = $paymentStatus;
         $order->snap_token = $token;
         $order->courier = Session::get('deliveryDetails')['selectedCourier'].'( '.Session::get('deliveryDetails')['selectedService'].')';
         $order->delivery_cost = $this->deliveryCost;
         $order->shipping_address = $this->addressLine;
         $order->save();

        OrderPlaced::dispatch($order);

         $this->orderId = $order->id;

         return $this;
    }

    public function saveOrderItems()
    {
        foreach (Session::get('cart') as $item) {
            OrderProduct::create([
                'order_id' => $this->orderId,
                'product_id' => $item['id'],
                'price' => $item['price'],
                'quantity' => $item['quantity']
            ]);
        }
        //
        if($this->donation !== null) {
            Donation::create([
                'customer_id' => Auth::guard('customer')->id(),
                'amount' => $this->donation
            ]);
        }
        return $this;
    }

    public function saveOrderDetails($response)
    {
        $details = new OrderDetail();
        $details->order_id = $this->orderId;
        $details->status_code = $response['status_code'];
        $details->status_message = $response['status_message'];
        $details->transaction_id = $response['transaction_id'];
        $details->payment_type = $response['payment_type'];
        $details->transaction_time = $response['transaction_time'];
        $details->transaction_status = $response['transaction_status'];
        $details->fraud_status = $response['fraud_status'] ?? null;
        $details->payment_code = $response['payment_code'] ?? null;
        $details->pdf_url = $response['pdf_url'] ?? null;
        $details->finish_redirect_url = $response['finish_redirect_url'];
        $details->save();
        return $this;
    }

    public function clearCart()
    {
        return Session::forget('cart');
    }

    public function updateDeliveryFee()
    {
        $this->mount();
        $this->isReadyForPayment = true;
    }

    public function updateItems()
    {
        $this->mount();
    }

    public function setAddressLine($address)
    {
         $this->addressLine = $address;
    }
}
