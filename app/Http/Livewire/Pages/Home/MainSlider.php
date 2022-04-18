<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Product;
use Livewire\Component;

class MainSlider extends Component
{
    public $mainSlider;
    public $randomProducts;

    public function render()
    {
        return view('livewire.pages.home.main-slider');
    }

    public function mount()
    {
        $this->mainSlider = Product::where('discounted', 1)
            ->inRandomOrder()
            ->take(4)
            ->get();
        $this->randomProducts = Product::inRandomOrder()
            ->take(4)
            ->get();
    }
}
