<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use Livewire\Component;

class Index extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.index')
            ->extends('layouts.app');
    }

    public function mount(Product $product)
    {
        $this->product = $product->load(['reviews', 'category', 'store', 'artist', 'ratings']);
    }
}
