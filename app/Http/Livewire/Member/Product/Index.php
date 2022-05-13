<?php

namespace App\Http\Livewire\Member\Product;

use App\Services\MemberProductSorting;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;

class Index extends Component
{
    use WithPagination;

    public $codeNumber;

    public $sortingType;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.member.product.index', [
            'products' => $this->getProducts()
        ])
            ->extends('layouts.admin');
    }

    public function mount()
    {
        $this->codeNumber = null;

        $this->sortingType = null;
    }

    public function getProducts()
    {
        if($this->codeNumber === null || $this->codeNumber === '')
        {
            return $this->getAllProducts();
        }else{
            return $this->getProductByCodeNumber();
        }
    }

    public function getAllProducts(): LengthAwarePaginator
    {
        if($this->sortingType === null)
        {
            return (new MemberProductSorting())->byFeatured();
        }else{
            return match($this->sortingType)
            {
                '' => (new MemberProductSorting())->byFeatured(),
                'featured' => (new MemberProductSorting())->byFeatured(),
                'top-sell' => (new MemberProductSorting())->byTopSell(),
                'price-low-to-high' => (new MemberProductSorting())->byPriceLowToHigh(),
                'price-high-to-low' => (new MemberProductSorting())->byPriceHighToLow(),
            };
        }
    }

    public function getProductByCodeNumber()
    {
        return (new MemberProductSorting())->byCodeNumber($this->codeNumber);
    }
}
