<?php

namespace App\Http\Livewire\Pages\Checkout;

use App\Models\Courier;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Session;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Kavist\RajaOngkir\Facades\RajaOngkir;

class Address extends Component
{
    public $customer;
    public $addresses;

    public $addressLine;

    public $couriers;
    public $deliveryServices;

    public $courierId;
    public $deliveryServiceId;

    public $selectedCourier;

    public $initialService;

    public function render()
    {
        return view('livewire.pages.checkout.address');
    }

    public function mount()
    {
       $this->customer = Auth::guard('customer')->user();
       $this->addresses = Auth::guard('customer')->user()->shippingAddress;
       $this->couriers = Courier::all();
       $this->deliveryServices  = collect();

    }

    public function updatedCourierId()
    {
        $address = ShippingAddress::find($this->addressLine);
        $delivery = RajaOngkir::ongkosKirim([
            'origin'        => 239,     // ID kota/kabupaten asal
            'destination'   => $address->city_id,      // ID kota/kabupaten tujuan
            'weight'        => 1300,    // berat barang dalam gram
            'courier'       => $this->courierId    // kode kurir pengiriman: ['jne', 'tiki', 'pos'] untuk starter
        ])->get();
        $this->selectedCourier = $delivery[0]['name'];
        $this->deliveryServices = collect($delivery[0]['costs']);
        Session::forget('deliveryService');
        Session::put('deliveryService', $delivery);
    }

    public function updatedDeliveryServiceId()
    {
         $services = collect(Session::get('deliveryService')[0]['costs']);
         $selected = $services->first(function($value, $key){
                return $value['service'] == $this->deliveryServiceId;
         });
        $deliveryDetails = [
            'selectedAddress' => $this->addressLine,
            'selectedCourier' => $this->selectedCourier,
            'selectedService' => $selected['description'],
            'cost' => $selected['cost'][0]['value'],
            'estimatedDay' => $selected['cost'][0]['etd']

        ];
        Session::forget('deliveryDetails');
        Session::put('deliveryDetails' , $deliveryDetails);
        $this->emitTo('pages.checkout.order', 'deliveryServiceUpdated');
    }

    public function updatedAddressLine()
    {
         $this->emitTo('pages.checkout.order', 'addressSelected', $this->addressLine);
    }

    public function updateComponent()
    {
         $this->mount();
    }
}
