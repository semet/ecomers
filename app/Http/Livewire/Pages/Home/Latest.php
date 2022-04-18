<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Product;
use Livewire\Component;

class Latest extends Component
{

    public $products;

    public function render()
    {
        return view('livewire.pages.home.latest');
    }

    public function mount()
    {
            $this->products = Product::latest()->get();
    }
    public function addToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded', $id);
    }

}
