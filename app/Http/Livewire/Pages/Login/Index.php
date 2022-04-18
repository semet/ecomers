<?php

namespace App\Http\Livewire\Pages\Login;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.pages.login.index')
            ->extends('layouts.app');
    }
}
