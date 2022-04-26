<?php

namespace App\Http\Livewire\Pages\Store;

use Livewire\Component;

class ProductSort extends Component
{
    public $sortingType;

    public function render()
    {
        return view('livewire.pages.store.product-sort');
    }

    public function updatedSortingType()
    {
         $this->emitTo('pages.store.index', 'sortingTypeChanged', $this->sortingType);
    }


}
