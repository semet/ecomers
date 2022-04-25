<?php

namespace App\Http\Livewire\Pages\Shop;

use App\Models\Category;
use App\Models\Product;
use App\Services\ProductFilter;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;
use Ramsey\Collection\Collection;

class Index extends Component
{
    use WithPagination;

    public $category;
    public $priceRange;
    public $filterType;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'priceRangeChanged' => 'changePriceRange',
        'filterChanged' => 'changeFilter'
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
        $this->filterType = null;
    }

    public function getProducts()
    {
        if($this->filterType === null)
        {
            return (new ProductFilter())->byFeatured($this->category->id, $this->priceRange);
        }else{
             $products = match ($this->filterType){
                'featured' => (new ProductFilter())->byFeatured($this->category->id, $this->priceRange),
                'latest' => (new ProductFilter())->byLatest($this->category->id, $this->priceRange),
                'price-low-to-high' => (new ProductFilter())->byPriceLowToHigh($this->category->id, $this->priceRange),
                'price-high-to-low' => (new ProductFilter())->byPriceHighToLow($this->category->id, $this->priceRange),
            };

             return $products;
        }

    }

    public function changePriceRange($price): void
    {
        $this->resetPage();
        $this->priceRange = collect();
        $this->priceRange->push($price);
    }

    public function changeFilter(string $type): void
    {
        $this->resetPage();
        $this->priceRange = collect();
        $this->filterType = $type;
    }

    public function addToCart($id)
    {
       //
    }
}
