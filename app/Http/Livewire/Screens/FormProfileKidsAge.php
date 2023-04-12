<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormProfileKidsAge extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('kidsAge', []);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('kidsAge', $this->input);
        $user->save();

        return redirect()->route('formProfileAllergies');
    }

    public function render()
    {
        $options = [
            'under1Year' => 'Under 1 year old',
            '1-2' => '1-2',
            '3–5' => '3–5',
            '6–13' => '6–13',
            '14–18' => '14–18',
        ];

        return view('livewire.screens.form-profile-kids-age', ['options' => $options]);
    }
}
