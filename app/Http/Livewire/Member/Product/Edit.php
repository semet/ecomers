<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Product;
use Livewire\Component;

class Edit extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.member.product.edit')
            ->extends('layouts.admin');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }
}
