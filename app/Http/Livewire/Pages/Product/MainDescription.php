<?php

namespace App\Http\Livewire\Pages\Product;

use Livewire\Component;

class MainDescription extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.main-description');
    }

    public function mount($product)
    {
        $this->product = $product;
    }
}
