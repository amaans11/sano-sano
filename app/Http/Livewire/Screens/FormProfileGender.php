<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormProfileGender extends Component
{
    public string $input = '';

    protected $rules = [
        'input' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('gender', '');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('gender', $this->input);
        $user->save();

        return redirect()->route('householdForm');
    }

    public function back()
    {
        return redirect()->route('formProfileAge');
    }

    public function render()
    {
        $options = [
            'female' => 'Female',
            'male' => 'Male',
            'nonBinary' => 'Non-binary',
            'other' => 'Other',
        ];

        return view('livewire.screens.form-profile-gender', ['options' => $options]);
    }
}
