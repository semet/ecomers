<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Product;
use Livewire\Component;

class TopSell extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.pages.home.top-sell');
    }

    public function mount()
    {
        $this->products = Product::where('discounted', 1)
            ->orderBy('sold')
            ->orderBy('discounted_amount')
            ->limit(2)
            ->get();
    }

    public function addToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded', $id);
    }
}
