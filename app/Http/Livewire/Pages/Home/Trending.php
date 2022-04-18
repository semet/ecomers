<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Product;
use Livewire\Component;

class Trending extends Component
{
    public $products;

    public function render()
    {
        return view('livewire.pages.home.trending');
    }

    public function mount()
    {
        $this->products = Product::latest()
            ->withCount('reviews')
            ->take(6)
            ->get();
    }

}
