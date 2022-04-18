<?php

namespace App\Http\Livewire\Ui;

use Livewire\Component;

class ProductCardSimple extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.ui.product-card-simple');
    }

    public function addToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded', $id);
    }
}
