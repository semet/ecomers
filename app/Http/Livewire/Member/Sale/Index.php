<?php

namespace App\Http\Livewire\Member\Sale;

use App\Models\Product;
use Exception;
use Livewire\Component;

class Index extends Component
{

    public $product;

    public $codeNumber;

    public $errorMessage;

    public function render()
    {
        return view('livewire.member.sale.index')
            ->extends('layouts.admin');
    }

    public function mount()
    {
        $this->product = null;
        $this->errorMessage = null;
    }

    public function updatedCodeNumber()
    {
        $product = Product::where('code_number', $this->codeNumber)->first();

        if(!$product){
            $this->errorMessage = "Product Not found";

            return;
        }else{
            $this->product = $product;
            $this->errorMessage = null;
        }

    }

    public function setCurrentProduct($id)
    {
        $this->emitTo('member.sale.add-new', 'setCurrentProduct', $id);
    }
}
