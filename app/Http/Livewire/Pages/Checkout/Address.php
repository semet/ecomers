<?php

namespace App\Http\Livewire\Pages\Checkout;

use App\Models\City;
use App\Models\Courier;
use App\Models\Province;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Address extends Component
{
    public $customer;
    public $addresses;

    public $addressLine;

    public $couriers;

    public function render()
    {
        return view('livewire.pages.checkout.address');
    }

    public function mount()
    {
       $this->customer = Auth::guard('customer')->user();
       $this->addresses = Auth::guard('customer')->user()->shippingAddress;
       $this->couriers = Courier::all();

    }

    public function updateComponent()
    {
         $this->mount();
    }
}
