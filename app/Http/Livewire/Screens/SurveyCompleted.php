<?php

namespace App\Http\Livewire\Screens;

use Livewire\Component;

class SurveyCompleted extends Component
{
    public function submit()
    {
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.screens.survey-completed');
    }
    
}
