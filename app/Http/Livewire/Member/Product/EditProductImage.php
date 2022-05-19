<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class EditProductImage extends Component
{

    public $product;
    public $images;

    public function render()
    {
        return view('livewire.member.product.edit-product-image');
    }

    public function mount($product)
    {
        $this->product = $product->toArray();

        $this->images = $product->images()->get();

    }

    public function deleteImage($id)
    {
        $image  = ProductImage::find($id);
        if(Storage::exists('public/products/'.$image->name)){
            Storage::delete('public/products/'.$image->name);
        }
        $image->delete();
        $this->dispatchBrowserEvent('imageDeleted', $id);
    }
}
