<?php

namespace App\Http\Livewire\Member\Home;

use Livewire\Component;

class Index extends Component
{
    public function render()
    {
        return view('livewire.member.home.index')
            ->extends('layouts.admin');
    }
}
