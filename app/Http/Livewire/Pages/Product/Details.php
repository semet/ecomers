<?php

namespace App\Http\Livewire\Pages\Product;

use Livewire\Component;

class Details extends Component
{
    public $product;

    public $quantity;

    protected $listeners = [
        'productRatingUpdated' => 'updateComponent'
    ];

    public function render()
    {
        return view('livewire.pages.product.details');
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->quantity = 1;
    }

    public function incrementItem()
    {
        return $this->quantity++;
    }

    public function decrementItem()
    {
        return $this->quantity--;
    }

    public function handleAddToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded',$id , $this->quantity);
    }

    public function updateComponent()
    {
        $this->mount($this->product);
    }
}
