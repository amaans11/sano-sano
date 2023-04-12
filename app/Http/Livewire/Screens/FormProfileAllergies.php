<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class FormProfileAllergies extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('allergies', []);
    }

    public function back()
    {
        return redirect()->route('formProfileKidsAge');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('allergies', $this->input);
        $user->save();

        return redirect()->route('healthPriorities');
    }

    public function render()
    {
        $options = [
            'none' => 'None',
            'diary' => 'Diary',
            'eggs' => 'Eggs',
            'meat' => 'Meat',
            'shellfish' => 'Shellfish',
            'peanuts' => 'Peanuts',
            'treeNuts' => 'Tree nuts',
            'soy' => 'Soy',
            'gluten' => 'Gluten',
            'other' => 'Other',
        ];

        return view('livewire.screens.form-profile-allergies', ['options' => $options]);
    }
}
