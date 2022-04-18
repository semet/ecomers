<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Product;
use Livewire\Component;

class Recomended extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.pages.home.recomended');
    }

    public function mount()
    {
       $this->products = Product::inRandomOrder()
           ->limit(6)
           ->get();
    }
}
