<?php

namespace App\Http\Livewire\Pages\Store;

use App\Models\Product;
use App\Models\Store;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public $store;

    public $priceRange;

    protected $paginationTheme = 'bootstrap';

    protected $listeners = [
        'priceRangeChanged' => 'changePriceRange'
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
    }

    public function getProducts()
    {
        if($this->priceRange->isEmpty())
        {
            return $this->store
                ->products()
                ->latest()
                ->withCount('reviews')
                ->paginate(20);
        }else{
            return $this->store
                ->products()
                ->whereBetween('latest_price', $this->priceRange->flatten())
                ->withCount('reviews')
                ->paginate(20);
        }
    }

    public function changePriceRange($price)
    {
        $this->resetPage();
        $this->priceRange = collect();
        $this->priceRange->push($price);

    }

    public function addToCart($id)
    {
        dd($id);
    }
}
