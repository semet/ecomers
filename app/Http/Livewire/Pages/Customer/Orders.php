<?php

namespace App\Http\Livewire\Pages\Customer;

use App\Models\Order;
use App\Models\OrderProduct;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class Orders extends Component
{
    public $orders;

    public function render()
    {
        return view('livewire.pages.customer.orders');
    }

    public function mount()
    {
        $this->orders = Auth::guard('customer')
            ->user()
            ->orders;
    }
}
