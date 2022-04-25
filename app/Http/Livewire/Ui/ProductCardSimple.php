<?php

namespace App\Http\Livewire\Ui;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ProductCardSimple extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.ui.product-card-simple');
    }

    public function addToCart($id)
    {
        $this->emitTo('partials.cart-preview', 'itemAdded', $id, 1);
    }

    public function handlePreview($product)
    {
        $this->emitTo('partials.product-preview', 'showProduct', $product);
    }

    public function handleAddToWishlist(string $productId)
    {
        if(!Auth::guard('customer')->check()){
            $this->dispatchBrowserEvent('pleaseLogin');
        }else{
            $this->addToWishlists($productId);
        }
    }

    public function addToWishlists(string $productId)
    {
        $wishlist = Wishlist::where('customer_id', Auth::guard('customer')->id())
            ->where('product_id', $productId)
            ->first();

        if(!$wishlist){
            Wishlist::create([
                'customer_id' => Auth::guard('customer')->id(),
                'product_id' => $productId
            ]);
            $this->emitTo('partials.wishlist-preview', 'itemAddedToWishlist');
        }else{
            $this->dispatchBrowserEvent('itemAlreadyInWishlist');
        }
    }
}
