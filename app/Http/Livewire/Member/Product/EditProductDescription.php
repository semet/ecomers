<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Product;
use Livewire\Component;
use Illuminate\Support\Str;

class EditProductDescription extends Component
{
    public $product;

    protected $rules = [
        'product.description' => 'required',
        'product.details' => 'required',
    ];

    public function render()
    {
        return view('livewire.member.product.edit-product-description');
    }

    public function mount($product)
    {
        $this->product = $product->toArray();
    }

    public function handleSubmit()
    {
        if($this->product['description'] === '' || $this->product['details'] === '')
        {
            $this->dispatchBrowserEvent('validationErrorDetected', ['message' => 'Please fill in all fields']);
        }elseif(Str::length($this->product['description']) <= 50 || Str::length($this->product['details']) <= 100){
            $this->dispatchBrowserEvent('validationErrorDetected', ['message' => 'Please give more details to the product']);
        }else{
            $product = Product::find($this->product['id'])
                ->update([
                    'description' => $this->product['description'],
                    'details' => $this->product['details'],
                ]);

            if($product){
                $this->dispatchBrowserEvent('productUpdated', ['message' => 'Product updated successfully']);
            }
        }


    }
}
