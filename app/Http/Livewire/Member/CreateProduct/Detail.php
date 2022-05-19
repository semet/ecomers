<?php

namespace App\Http\Livewire\Member\CreateProduct;

use App\Models\Artist;
use App\Models\Category;
use Livewire\Component;

class Detail extends Component
{
    public $categories,
            $artists;

    public $categoryId,
            $artistId,
            $codeNumber,
            $brand,
            $name,
            $price,
            $amount,
            $weight,
            $length,
            $width,
            $height,
            $colorFamily,
            $size;

    protected $rules = [
        'categoryId' => 'required',
        'artistId' => 'required',
        'codeNumber' => 'required',
        'name' => 'required',
        'price' => 'required',
        'amount' => 'required',
        'weight' => 'required',
        'length' => 'required',
        'width' => 'required',
        'height' => 'required',
        'colorFamily' => 'required',
        'size' => 'required',
    ];

    public function render()
    {
        return view('livewire.member.create-product.detail');
    }

    public function mount()
    {
        $this->categories = Category::orderBy('name')->get();

        $this->artists = Artist::orderBy('name')->get();
    }
}
