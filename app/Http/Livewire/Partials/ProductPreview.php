<?php

namespace App\Http\Livewire\Partials;

use App\Models\Product;
use Livewire\Component;

class ProductPreview extends Component
{
    public $product = null;

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
}
