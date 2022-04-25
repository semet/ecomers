<?php

namespace App\Http\Livewire\Pages\Product;

use App\Models\Product;
use App\Models\ProductRating;
use App\Models\ProductReview;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Review extends Component
{
    public $product;

    public $reviewText;

    protected $rules = [
        'reviewText' => 'required|min:10'
    ];

    public function render()
    {
        return view('livewire.pages.product.review');
    }

    public function mount(Product $product)
    {
        $this->product = $product;
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
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

    public function handleSubmitReview()
    {
        $validatedData = $this->validate();

        $this->product
            ->reviews()
            ->save(
                new ProductReview(
                    [
                        'product_id' => $this->product->id,
                        'customer_id' => Auth::guard('customer')->id(),
                        'review' => $this->reviewText,
                    ]
                )
            );

        $this->reviewText = '';

        $this->emit('reviewSaved', $this->product);
        $selected = Product::find($this->product->id)
            ->load(['reviews', 'category', 'store', 'artist', 'ratings']);
        $this->mount($selected);
    }
}
