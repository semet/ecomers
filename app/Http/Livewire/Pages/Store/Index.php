<?php

namespace App\Http\Livewire\Pages\Store;

use App\Models\Product;
use App\Models\Store;
use App\Services\StoreProductSorting;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $store;

    public $priceRange;

    public $sortingType;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'priceRangeChanged' => 'changePriceRange',
        'sortingTypeChanged' => 'changeSortingType'
    ];

    public function render()
    {
        return view('livewire.pages.store.index', [
            'products' => $this->getProducts()
        ])
            ->extends('layouts.app');
    }

    public function mount(Store $store)
    {
        $this->store = $store;
        $this->priceRange = collect();
        $this->sortingType = null;
    }

    public function getProducts(): LengthAwarePaginator
    {
        if($this->sortingType === null)
        {
            return (new StoreProductSorting())->byFeatured($this->store, $this->priceRange);
        }else{
            return match ($this->sortingType)
            {
                'featured' => (new StoreProductSorting())->byFeatured($this->store, $this->priceRange),
                'latest' => (new StoreProductSorting())->byLatest($this->store, $this->priceRange),
                'price-low-to-high' => (new StoreProductSorting())->byPriceLowToHigh($this->store, $this->priceRange),
                'price-high-to-low' => (new StoreProductSorting())->byPriceHighToLow($this->store, $this->priceRange),
            };
        }
    }

    public function changePriceRange($price)
    {
        $this->resetPage();
        $this->priceRange = collect();
        $this->priceRange->push($price);

    }

    public function changeSortingType($type)
    {
        $this->resetPage();
        $this->priceRange = collect();
        $this->sortingType = $type;
    }

    public function addToCart($id)
    {
        dd($id);
    }
}
