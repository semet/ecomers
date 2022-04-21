<?php

namespace App\Http\Livewire\Partials;

use App\Services\CartService;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CartPreview extends Component
{
    public $items;

    public $totalItems;

    public $totalPrice;

    protected $listeners = [
        'itemAdded' => 'addToCart',
        'cartUpdated' => 'updateCart'
    ];
    public function render()
    {
        return view('livewire.partials.cart-preview');
    }

    public function mount()
    {
        $this->items = CartService::getItems();
        $this->totalItems = CartService::totalItems();
        $this->totalPrice = CartService::totalPrice();

    }

    public function addToCart($id)
    {
        CartService::addToCart($id);

        $this->mount();
    }

    public function removeItem($id)
    {
        CartService::removeFromCart($id);
        //emit event to cart index page to update the view accordingly
        $this->emit('cartUpdated');
        $this->mount();
    }

    // Event received from Cart/Index page
    public function updateCart()
    {
         $this->mount();
    }
}
