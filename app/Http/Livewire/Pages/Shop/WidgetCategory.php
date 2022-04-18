<?php

namespace App\Http\Livewire\Pages\Shop;

use App\Models\Category;
use Livewire\Component;

class WidgetCategory extends Component
{
    public $categories;

    public function render()
    {
        return view('livewire.pages.shop.widget-category');
    }
    public function mount()
    {
        $this->categories = Category::withCount('products')->get();
    }

}
