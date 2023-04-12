<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body  w-full max-w-md mx-auto px-4 py-6">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($input) ? 50 : 37.5 }}" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold text--primary">Tell us how important healthy eating is in your life.</h1>
        <p class="py-4 text--primary">Knowing how much healthy eating matters to you helps us offer better meal recommendations.</p>
    </div>

    <div class="grid grid-cols-2 gap-3 w-full max-w-md mx-auto">
        @foreach($options as $value => $text)
            <x-checkbox-card
                    name="input"
                    type="radio"
                    value="{{ $value }}"
                    checked="{{ $value === $input ? 'true' : 'false' }}"
                    label-class="col-span-2"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
            >
                {{ $text }}
            </x-checkbox-card>
        @endforeach

        @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end w-full max-w-md mx-auto pt-8 m-15">
        <x-button
                type="button"
                class="border-grey w-full mr-2"
                wire:click="back"
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
    </div>
    <x-analytics-tracker page="healthy-eating" />
</form>
