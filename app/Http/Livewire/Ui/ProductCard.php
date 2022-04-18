<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class ProductCard extends Component
{
    public $product;
    public $productId;
    public function render()
    {
        return view('livewire.ui.product-card');
    }

    public function addToCart($id)
    {
       $this->emitTo('partials.cart-preview', 'itemAdded', $id);
    }
}
