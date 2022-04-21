<?php

namespace App\Http\Livewire\Pages\Wishlist;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Ramsey\Collection\Collection;

class Index extends Component
{
    public $wishlists;

    public function render()
    {
        return view('livewire.pages.wishlist.index')
            ->extends('layouts.app');
    }

    public function mount()
    {
         $this->wishlists = Wishlist::where('customer_id', Auth::guard('customer')->id())->get();
    }

    public function handleAddToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded', $id, 1);
    }

    public function handleRemove($id)
    {
         Wishlist::where([
             'customer_id' => Auth::guard('customer')->id(),
             'product_id' => $id
         ])->delete();

         $this->emitTo('partials.wishlist-preview', 'itemRemovedFromWishlist');
         $this->mount();
    }
}
