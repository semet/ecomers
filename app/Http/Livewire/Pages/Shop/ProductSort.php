<?php

namespace App\Http\Livewire\Pages\Shop;

use Livewire\Component;

class ProductSort extends Component
{
    public $filterTypes;

    public function render()
    {
        return view('livewire.pages.shop.product-sort');
    }

    public function updatedFilterTypes()
    {
        $this->emitTo('pages.shop.index', 'filterChanged', $this->filterTypes);
    }
}
