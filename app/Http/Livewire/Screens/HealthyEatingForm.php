<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HealthyEatingForm extends Component
{
    public string $input = '';

    protected $rules = [
        'input' => ['required', 'string'],
    ];
    public function mount()
    {
        $this->input = Auth::user()->data->get('healthyEating', '');
    }
    public function back(){
        return redirect()->route('formProfileGender');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('healthyEating', $this->input);
        $user->save();

        return redirect()->route('householdForm');
    }
    public function render()
    {
        $options = [
            'xxtremelyImportant' => 'Extremely important',
            'veryImportant' => 'Very important',
            'important' => 'Important',
            'somewhatimportant' => 'Somewhat important',
            'notImportant' => 'Not important at all',
        ];

        return view('livewire.screens.healthy-eating-form', ['options' => $options])->layout('layouts.app');
    }
}
