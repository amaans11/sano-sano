<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormProfileAge extends Component
{
    public string $input = '';

    protected $rules = [
        'input' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('age', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('age', $this->input);
        $user->save();

        return redirect()->route('formProfileGender');
    }

    public function render()
    {
        $options = [
            '18-34' => '18-34',
            '35-44' => '35-44',
            '45-54' => '45-54',
            '55' => '55+',
        ];

        return view('livewire.screens.form-profile-age', ['options' => $options]);
    }
}
