<?php

namespace App\Http\Livewire\Member\RunoutProduct;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.member.runout-product.index', [
            'products' => $this->getProducts()
        ])
            ->extends('layouts.admin');
    }

    public function getProducts()
    {
        return Auth::guard('member')
            ->user()
            ->store
            ->products()
            ->where('amount', 0)
            ->paginate(20);
    }
}
