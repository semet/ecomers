<?php

namespace App\Http\Livewire\Pages\Checkout;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.checkout.index')
            ->extends('layouts.app');
    }
}
