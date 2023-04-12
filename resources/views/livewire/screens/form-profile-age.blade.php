<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body  w-full max-w-md mx-auto px-4 py-6">
    <div class="h-full w-full max-w-md mx-auto">
        <x-progress-bar value="{{ ($input) ? 17 : 0 }}" class="mb-10 mt-3"/>

        <h1 class="text-4xl font-bold mb-8 text--primary">How old are you?</h1>
    </div>

    <div class="grid grid-cols-2 gap-3 w-full max-w-md mx-auto">
        @foreach($options as $value => $text)
            <x-checkbox-card
                    name="input"
                    type="radio"
                    value="{{ $value }}"
                    checked="{{ $value === $input ? 'true' : 'false' }}"
                    label-class="{{ $value === 'other' ? 'col-span-2' : '' }}"
                    class="rounded-lg flex justify-center items-center py-4 px-2 font-bold"
            >
                {{ $text }}
            </x-checkbox-card>
        @endforeach

        @error('input') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
    </div>

    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
                style="width:50%"
        >
            Next
            <i class="fas fa-arrow-right ml-3"></i>
        </x-button>
        <x-analytics-tracker page="profile-age" />
    </div>
</form>
