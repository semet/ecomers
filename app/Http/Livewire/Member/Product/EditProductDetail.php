<?php

namespace App\Http\Livewire\Member\Product;

use App\Models\Artist;
use App\Models\Category;
use App\Models\Product;
use Livewire\Component;

class EditProductDetail extends Component
{

    public $product;

    public $categories,
            $artists;

    public $categoryId,
            $artistId,
            $codeNumber,
            $brand,
            $oldPrice,
            $latestPrice;

    protected $rules = [
        'product.category_id'   => 'required',
        'product.artist_id'     => 'required',
        'product.code_number'   => 'required',
        'product.name'          => 'required',
        'product.latest_price'  => 'required',
        'product.amount'        => 'required', // TODO: Make it accept only INT
        'product.weight'        => 'required', // TODO: Make it accept only INT
    ];

    public function render()
    {
        return view('livewire.member.product.edit-product-detail');
    }

    public function mount($product)
    {
        $this->product = $product->toArray();

        $this->categories = Category::orderBy('name')->get();

        $this->artists = Artist::orderBy('name')->get();
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function handleSubmit()
    {
        $this->validate();

        $product = Product::find($this->product['id'])
            ->update([
                'category_id'   => $this->product['category_id'],
                'artist_id'     => $this->product['artist_id'],
                'code_number'   => $this->product['code_number'],
                'brand'         => $this->product['brand'],
                'name'          => $this->product['name'],
                'old_price'     => $this->product['old_price'],
                'latest_price'  => $this->product['latest_price'],
                'amount'        => $this->product['amount'],
                'weight'        => $this->product['weight'],
                'length'        => $this->product['length'],
                'width'         => $this->product['width'],
                'high'          => $this->product['high'],
                'color_family'  => $this->product['color_family'],
                'size'          => $this->product['size'],
            ]);

        if($product){
            $this->dispatchBrowserEvent('productUpdated');
        }
    }
}
