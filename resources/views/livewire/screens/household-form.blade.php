<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($noOfAdults) ? 50 : 34 }}" class="mb-10 mt-3"/>
        <h1 class="text-4xl font-bold mb-4 text--primary">Your household</h1>
        <span class="text-2xl text--primary">How many <span class="font-bold">adults</span> live in your household?</span>
        <p class="text-sm text--primary">Including you!</p>
    </div>
   
    <div class="flex flex-row justify-center h-full w-full max-w-md mx-auto">
        <span wire:click="decrementAdultCounter" class="bg-grey w-16 h-16 rounded mt-2 flex flex-row justify-center cursor-pointer" style="font-size:40px;">
            <img src="{{ asset('images/icons/Minus-darkblue.png') }}" class="w-8 h-8 mt-4" />
        </span>
        <div class="h-16 rounded mt-2 flex flex-row justify-center text-secondary font-bold" style="width:128px;font-size:40px;">{{$noOfAdults}}</div>
        <span wire:click="incrementAdultCounter" class="bg-grey w-16 h-16 rounded mt-2 flex flex-row justify-center cursor-pointer" style="font-size:40px;">
            <img src="{{ asset('images/icons/Plus-darkblue.png') }}" class="w-8 h-8 mt-4" />
        </span>
    </div>
    <div class="h-full w-full max-w-md mx-auto">
        <span class="text-2xl text--primary">How many <span class="font-bold">kids under 18 yrs old</span> live in your household?</span>
    </div>
    <div class="flex flex-row justify-center h-full w-full max-w-md mx-auto">
        <span wire:click="decrementKidCounter" class="bg-grey w-16 h-16 rounded mt-2 flex flex-row justify-center cursor-pointer" style="font-size:40px;">
            <img src="{{ asset('images/icons/Minus-darkblue.png') }}" class="w-8 h-8 mt-4" />
        </span>
        <div class="h-16 rounded mt-2 flex flex-row justify-center text-secondary font-bold" style="width:128px;font-size:40px;">{{$noOfKids}}</div>
        <span wire:click="incrementKidCounter" class="bg-grey w-16 h-16 rounded mt-2 flex flex-row justify-center cursor-pointer" style="font-size:40px;">

        <img src="{{ asset('images/icons/Plus-darkblue.png') }}" class="w-8 h-8 mt-4" /></span>
    </div>
    @error('noOfAdults') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror

    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
            type="button"
            wire:click="back"
            class="border-grey w-full mr-2"
        >
            <img src="{{ asset('images/icons/arrow-left.png') }}" class="w-10 h-6 pr-4" />
            Back
        </x-button>
        <x-button
            type="submit"
            class="btn--primary w-full ml-2"
            wire:loading.attr="disabled"
        >
            Next
            <i class="fas fa-arrow-right ml-3"></i>
        </x-button>
        <x-analytics-tracker page="household-start" />
    </div>
</form>






