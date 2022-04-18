<?php

namespace App\Http\Livewire\Partials;

use App\Models\Category;
use App\Models\Store;
use Livewire\Component;

class MainMenu extends Component
{
    public $categories;
    public $stores;

    public function render()
    {
        return view('livewire.partials.main-menu');
    }

    public function mount()
    {
        $this->categories = Category::all();
        $this->stores = Store::all();
    }
}
