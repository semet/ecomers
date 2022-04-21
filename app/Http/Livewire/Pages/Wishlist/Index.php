<?php

namespace App\Http\Livewire\Pages\Wishlist;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.wishlist.index')
            ->extends('layouts.app');
    }
}
