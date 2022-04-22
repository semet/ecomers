<?php

namespace App\Http\Livewire\Pages\Product;

use Livewire\Component;

class AdditionalInfo extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.additional-info');
    }

    public function mount($product)
    {
        $this->product = $product;
    }
}
