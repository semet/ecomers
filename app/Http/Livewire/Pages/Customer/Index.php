<?php

namespace App\Http\Livewire\Pages\Customer;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.customer.index')
            ->extends('layouts.app');
    }
}
