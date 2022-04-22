<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\ProductRating;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $product;

    public function render()
    {
        return view('livewire.pages.product.review');
    }

    public function mount($product)
    {
        $this->product = $product;
    }

    public function rate($amount)
    {
        if(!Auth::guard('customer')->check()){
            $this->dispatchBrowserEvent('pleaseLogin');
        }else{
            $rating = ProductRating::query()
                ->where('customer_id', '=', Auth::guard('customer')->id())
                ->where('product_id', '=', $this->product->id)
                ->first();
            if($rating){
                $rating->value = $amount;
                $rating->save();
            }else{
                return ProductRating::create([
                    'customer_id' => Auth::guard('customer')->id(),
                    'product_id' => $this->product->id,
                    'value' => $amount
                ]);
            }

            $this->emit('productRatingUpdated');
        }

    }
}
