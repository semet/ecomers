<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;

class RelatedProduct extends Component
{
    public $products;
    public $product;

    public function render()
    {
        return view('livewire.pages.product.related-product');
    }

    public function mount($product)
    {
        $this->product = $product;
        $this->products = Product::where('category_id', $product->category_id)
            ->limit(6)
            ->get();
    }
}
