<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\Confirmation;
use Livewire\Component;

class FormSignup extends Component
{
    public string $email = '';
    public string $name = '';

    protected $rules = [
        'email' => ['required', 'email'],
        'name' => ['required', 'string'],
    ];

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->email = $this->email;
        $user->name = $this->name;
        $user->data->put('hurdle_process', 'done');
        $user->save();

        Mail::to($this->email)->send(new Confirmation());

        return redirect()->route('surveyCompleted');
    }

    public function render()
    {
        return view('livewire.screens.form-signup');
    }
}
