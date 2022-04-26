<?php

namespace App\Http\Livewire\Pages\Shop;

use Livewire\Component;

class ProductSort extends Component
{
    public $sortingType;

    public function render()
    {
        return view('livewire.pages.shop.product-sort');
    }

    public function updatedSortingType()
    {
        $this->emitTo('pages.shop.index', 'sortingTypeChanged', $this->sortingType);
    }
}
