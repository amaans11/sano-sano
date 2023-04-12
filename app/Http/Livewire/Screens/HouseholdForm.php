<?php

namespace App\Http\Livewire\Screens;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class HouseholdForm extends Component
{
    public $noOfAdults = 1;
    public $noOfKids = 0;

    protected $rules = [
        'noOfAdults' => ['required', 'integer'],
        'noOfKids' => ['required', 'integer'],
    ];

    public function mount()
    {
        $this->noOfAdults = Auth::user()->data->get('noOfAdults', 1);
        $this->noOfKids = Auth::user()->data->get('noOfKids', 0);
    }

    public function submit()
    {
        $this->validate();

        $user = Auth::user();
        $user->data->put('noOfAdults', $this->noOfAdults);
        $user->data->put('noOfKids', $this->noOfKids);
        $user->save();

        return redirect()->route('formProfileKidsAge');
    }

    public function render()
    {
        return view('livewire.screens.household-form', ['noOfAdults'=>$this->noOfAdults, 'noOfKids' => $this->noOfKids]);
    }

    public function back()
    {
        return redirect()->route('formProfileGender');
    }

    public function incrementAdultCounter()
    {
        $this->noOfAdults++;
    }

    public function decrementAdultCounter()
    {
        $this->noOfAdults > 1 ? $this->noOfAdults-- : 1;
    }

    public function incrementKidCounter()
    {
        $this->noOfKids++;
    }

    public function decrementKidCounter()
    {
        $this->noOfKids > 0 ? $this->noOfKids-- : 0;
    }
}
