<?php

namespace App\Http\Livewire\Partials;

use App\Models\Product;
use Livewire\Component;

class ProductPreview extends Component
{
    public $product = null;

    public $quantity = 1;

    protected $listeners = [
        'showProduct' => 'handleShowProduct'
    ];

    public function render()
    {
        return view('livewire.partials.product-preview');
    }

    public function handleShowProduct($productId)
    {
         $this->product = Product::find($productId)->load('category');
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
}
