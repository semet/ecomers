<?php

namespace App\Http\Livewire\Pages\Shop;

use App\Models\Category;
use App\Models\Product;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $category;
    public $priceRange;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'priceRangeChanged' => 'changePriceRange'
    ];

    public function render()
    {
        return view('livewire.pages.shop.index', [
            'products' => $this->getProducts()
        ])
            ->extends('layouts.app');
    }

    public function mount(Category $category)
    {
        $this->category = $category;
        $this->priceRange = collect();
    }

    public function getProducts()
    {
        if($this->priceRange->isEmpty())
        {
            return Product::where('category_id', $this->category->id)
                ->withCount('reviews')
                ->paginate(20);
        }
        else
        {
            return Product::where('category_id', $this->category->id)
                ->whereBetween('latest_price', $this->priceRange->flatten())
                ->withCount('reviews')
                ->paginate(20);
        }

    }

    public function changePriceRange($price)
    {
        $this->priceRange = collect();
        $this->priceRange->push($price);

    }

    public function addToCart($id)
    {
        dd($id);
    }
}
