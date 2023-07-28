<?php

namespace App\Http\Livewire\Auth;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class Login extends Component
{
    public $email, $password;

    public $rules = [
        'email' => 'required|email',
        'password' => 'required',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        $validatedData = $this->validate();
        if(Auth::attempt($validatedData)) {
            session()->regenerate();

            return redirect()->intended();
        }else{
            throw ValidationException::withMessages([
                'form' => __('auth.failed'),
            ]);
        }
    }

    public function render()
    {
        return view('livewire.auth.login');
    }
}
