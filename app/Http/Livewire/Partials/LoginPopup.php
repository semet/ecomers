<?php

namespace App\Http\Livewire\Partials;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginPopup extends Component
{
    public $email;

    public $password;

    public $remember;

    public $errorMessage = null;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];
    public function render()
    {
        return view('livewire.partials.login-popup');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleLogin()
    {
        if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password, 'active' => 1], $this->remember)) {
            request()->session()->regenerate();
            $this->dispatchBrowserEvent('loginSuccessfully');
        }
        else
        {
            $this->errorMessage = 'Credentials do not match our record';
        }
    }
}
