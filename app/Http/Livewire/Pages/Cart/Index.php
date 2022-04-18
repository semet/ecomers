<?php

namespace App\Http\Livewire\Pages\Cart;

use App\Services\CartService;
use Livewire\Component;

class Index extends Component
{
    public $items;

    public $totalItems;

    public $totalPrice;

    protected $listeners = [
        'cartUpdated' => 'updateCart',
    ];

    public function render()
    {
        return view('livewire.pages.cart.index')
            ->extends('layouts.app');
    }

    public function mount()
    {
        $this->items = CartService::getItems();
        $this->totalItems = CartService::totalItems();
        $this->totalPrice = CartService::totalPrice();
    }

    public function incrementItem($id)
    {
        CartService::incrementItem($id);
        // Emit event to cart preview to update the view accordingly
        $this->emitTo('partials.cart-preview','cartUpdated');
        $this->mount();
    }

    public function decrementItem($id)
    {
        CartService::decrementItem($id);
        // Emit event to cart preview to update the view accordingly
        $this->emitTo('partials.cart-preview','cartUpdated');
        $this->mount();
    }

    public function removeItem($id)
    {
        CartService::removeFromCart($id);
        // Emit event to cart preview to update the view accordingly
        $this->emitTo('partials.cart-preview','cartUpdated');
        $this->mount();
    }
    //Event received from CartPreview component
    public function updateCart()
    {
         $this->mount();
    }
}
