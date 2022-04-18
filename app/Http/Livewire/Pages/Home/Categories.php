<?php

namespace App\Http\Livewire\Pages\Home;

use App\Models\Category;
use Livewire\Component;

class Categories extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.pages.home.categories');
    }

    public function mount()
    {
        $this->categories = Category::withCount('products')
            ->take(6)
            ->get();
    }
}
