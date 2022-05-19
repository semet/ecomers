<?php

namespace App\Http\Livewire\Member\Sale;

use App\Models\Product;
use Livewire\Component;

class AddNew extends Component
{

    //TODO: add EventListener to Send notification to customer about the new sale

    public $product;

    public $newPrice;

    public $discount;

    protected $rules = [
        'newPrice' => 'required|numeric',
    ];

    protected $listeners = [
        'setCurrentProduct' => 'displayProduct',
    ];

    public function render()
    {
        return view('livewire.member.sale.add-new');
    }

    public function updated($prop)
    {
        $this->validateOnly($prop);
    }

    public function updatedNewPrice()
    {
        $amount =  $this->product['latest_price'] - $this->newPrice;
        $this->discount = round($amount / $this->product['latest_price'] * 100);
    }

    public function displayProduct($id)
    {
        $this->product = Product::find($id)->toArray();
    }

    public function handleSave()
    {
        $product = Product::find($this->product['id'])
            ->update([
                'old_price' => $this->product['latest_price'],
                'latest_price' => $this->newPrice,
                'discounted' => true,
                'discounted_amount' => $this->discount,
            ]);

        if($product){
            $this->dispatchBrowserEvent('productPriceUpdated', ['product' => $this->product]);
        }else{
            dd('failed');
        }
    }
}
