<?php

namespace App\Http\Livewire\Member\Product;

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
            return Auth::guard('member')
                        ->user()
                        ->store
                        ->products()
                        ->orderBy('view')
                        ->orderBy('sold')
                        ->paginate(20);
        }else{
            return match($this->sortingType)
            {
                '' => Auth::guard('member')
                                    ->user()
                                    ->store
                                    ->products()
                                    ->orderBy('view')
                                    ->orderBy('sold')
                                    ->paginate(20),

                'featured' => Auth::guard('member')
                                    ->user()
                                    ->store
                                    ->products()
                                    ->orderBy('view')
                                    ->orderBy('sold')
                                    ->paginate(20),

                'top-sell' => Auth::guard('member')
                                    ->user()
                                    ->store
                                    ->products()
                                    ->orderByDesc('sold')
                                    ->paginate(20),

                'price-low-to-height' => Auth::guard('member')
                                    ->user()
                                    ->store
                                    ->products()
                                    ->orderBy('latest_price')
                                    ->paginate(20),

                'price-height-to-low' => Auth::guard('member')
                                    ->user()
                                    ->store
                                    ->products()
                                    ->orderByDesc('latest_price')
                                    ->paginate(20),
            };
        }
    }

    public function getProductByCodeNumber()
    {
        return Auth::guard('member')
                ->user()
                ->store
                ->products()
                ->where('code_number', $this->codeNumber)
                ->paginate(20);
    }
}
