<?php

namespace App\Http\Livewire\Pages\Store;

use App\Models\Store;
use Livewire\Component;

class WidgetOffer extends Component
{
    public $store;

    public $products;

    public function render()
    {
        return view('livewire.pages.store.widget-offer');
    }

    public function mount($store)
    {
         $this->store = $store;
         $this->products = $this->getProducts();
    }

    public function getProducts()
    {
         $discounted = $this->store
             ->products()
             ->where('discounted', 1)
             ->limit(5)
             ->get();

         $topSale = $this->store
             ->products()
             ->orderBy('sold')
             ->limit(5)
             ->get();

         if($discounted->isNotEmpty())
         {
             return $discounted;
         }else{
             return $topSale;
         }
    }
}
