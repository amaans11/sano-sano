<?php

namespace App\Http\Livewire\Screens;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Livewire\Component;

class Welcome extends Component
{
    public function submit()
    {
        $password = Str::random(10);
        $name = 'Temp Name';
        $email = Str::random(50).'@example.com';

        $credentials = [
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
        ];

        User::create($credentials);

        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            request()->session()->regenerate();

            return redirect()->route('formProfileAge');
        }
    }

    public function render()
    {
        return view('livewire.screens.welcome')
            ->layout('layouts.guest');
    }
}
