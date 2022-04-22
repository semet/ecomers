<?php

namespace App\Http\Livewire\Pages\Product;

use Livewire\Component;

class Description extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.description');
    }

    public function mount($product)
    {
         $this->product = $product;
    }
}
