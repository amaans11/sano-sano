<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HealthPriorities extends Component
{
    public array $input = [];

    protected $rules = [
        'input' => ['required', 'array'],
        'input.*' => ['required', 'string'],
    ];

    public function mount()
    {
        $this->input = Auth::user()->data->get('healthPriorities', []);
    }

    public function back()
    {
        return redirect()->route('formProfileAllergies');
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('healthPriorities', $this->input);
        $user->save();

        return redirect()->route('formSignup');
    }

    public function render()
    {
        $options = [
            'Encourage them to try a greater variety of food.' => 'Encourage them to try a greater variety of food.',
            'More involvement in meal planning and preparation.' => 'More involvement in meal planning and preparation.',
            'Educate them on the impact of the food they eat on their mind & body.' => 'Educate them on the impact of the food they eat on their mind & body.',
            'Educate them on what makes a balanced meal.' => 'Educate them on what makes a balanced meal.',
        ];

        return view('livewire.screens.health-priorities', ['options' => $options]);
    }
}
