<?php

namespace App\Http\Livewire\Screens;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Registration extends Component
{
    public string $name = '';
    public string $email = '';
    public string $password = '';

    protected $rules = [
        'name' => ['required', 'string'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:8'],
    ];

    public function submit()
    {
        $this->validate();

        $credentials = [
            'name' => $this->name,
            'email' => $this->email,
            'password' => bcrypt($this->password),
        ];

        User::create($credentials);

        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
            request()->session()->regenerate();

            return redirect()->route('locationForm');
        }
    }

    public function render()
    {
        return view('livewire.screens.registration')
            ->layout('layouts.guest');
    }
}
