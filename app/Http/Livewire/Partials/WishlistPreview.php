<?php

namespace App\Http\Livewire\Partials;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class WishlistPreview extends Component
{
    public int $totalItems;

    protected $listeners = [
        'itemAddedToWishlist' => 'updateWishlist',
        'itemRemovedFromWishlist' => 'updateWishlist'
    ];
    public function render()
    {
        return view('livewire.partials.wishlist-preview');
    }

    public function mount()
    {
        $this->totalItems = Wishlist::where('customer_id', Auth::guard('customer')->id())
            ->get()
            ->count();
    }
    public function updateWishlist()
    {
         $this->mount();
    }
}
