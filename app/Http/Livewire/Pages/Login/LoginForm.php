<?php

namespace App\Http\Livewire\Pages\Login;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class LoginForm extends Component
{
    public $email;

    public $password;

    public $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function render()
    {
        return view('livewire.pages.login.login-form');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleLogin()
    {
        if (Auth::guard('customer')->attempt(['email' => $this->email, 'password' => $this->password, 'active' => 1], $this->remember)) {
            request()->session()->regenerate();
            return redirect()->route('account.cart');
        }
        else
        {
            $this->addError('invalidCredentials', 'Credentials do not match our record');
        }
    }
}
