<?php

namespace App\Http\Livewire\Pages\Checkout;

use App\Models\City;
use App\Models\Province;
use App\Models\ShippingAddress;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class NewAddress extends Component
{
    public $provinces;
    public $provinceId;

    public $cities;
    public $cityId;

    public $addressLine;
    public $addressLine2;

    public $zipCode;

    public $errorMessage;

    protected $rules = [
        'provinceId' => 'required',
        'cityId' => 'required',
        'addressLine' => 'required',
        'zipCode' => 'required',
    ];

    public function render()
    {
        return view('livewire.pages.checkout.new-address');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function mount()
    {
       $this->provinces  = Province::all();
       $this->cities = collect();
    }



    public function updatedProvinceId()
    {
         $this->cities = City::where('province_id', $this->provinceId)->get();
    }

    public function handleSave()
    {
        $this->validate();
        try {
            ShippingAddress::create([
                'customer_id' => Auth::guard('customer')->id(),
                'province_id' => $this->provinceId,
                'city_id' => $this->cityId,
                'address_line_1' => $this->addressLine,
                'address_line_2' => $this->addressLine2,
                'zip_code' => $this->zipCode
            ]);

            $this->dispatchBrowserEvent('newAddressAdded');

        }catch (\Exception $exception){
            //TODO: Add Alert to display Error
            $this->errorMessage = $exception->getMessage();
        }
    }
}
