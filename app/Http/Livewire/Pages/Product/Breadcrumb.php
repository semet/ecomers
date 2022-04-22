<?php

namespace App\Http\Livewire\Pages\Product;

use Livewire\Component;

class Breadcrumb extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.breadcrumb');
    }

    public function mount($product)
    {
        $this->product = $product;
    }
}
