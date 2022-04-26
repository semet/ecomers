<?php

namespace App\Http\Livewire\Member\Account;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email;
    public $password;
    public $remember;

    protected $rules = [
        'email' => 'required|email',
        'password' => 'required'
    ];


    public function render()
    {
        return view('livewire.member.account.login')
            ->extends('layouts.auth');
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function handleLogin()
    {
        $this->validate();

        if (Auth::guard('member')->attempt(['email' => $this->email, 'password' => $this->password, 'active' => 1], $this->remember)) {
            request()->session()->regenerate();
            return redirect()->route('member.home');
        }
        else
        {
            $this->addError('invalidCredentials', 'Credentials do not match our record');
        }

    }
}
