<?php

namespace App\Http\Livewire\Pages\Shop;

use Livewire\Component;

class WidgetFilterPrice extends Component
{
    public $min;
    public $max;

    public function render()
    {
        return view('livewire.pages.shop.widget-filter-price');
    }

    public function mount()
    {
        $this->min = 10;
        $this->max = 100000;
    }

    public function filterPrice()
    {
        $priceRange = collect([$this->min, $this->max]);
        $this->emitTo('pages.shop.index', 'priceRangeChanged', $priceRange);
    }
}
