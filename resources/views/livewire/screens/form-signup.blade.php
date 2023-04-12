<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body py-4">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <h1 class="text-xl font-bold mt-2 text--primary text-center">Thanks for helping us better understand your needs regarding your kids’ experience! </h1>
    </div>
    <div class="h-full px-4 w-full max-w-md mx-auto mt-4">
        <div>
            <div class="flex flex-row justify-center">
                <img src="{{ asset('images/icons/rocket.gif') }}"  class="w-20 h-20" />
            </div>
            <p class="text--primary pt-4 pb-2 uppercase text-center">Sano sano is launching soon!</p>
            <p class="text-2xl text--primary font-bold text-center pb-4">Sign up for our early access list</p>
            <p class="text-base text--primary text-center">In the meantime, we’ll send you a few tips and tricks to help get your kids started on the path to building healthier eating habits.</p>
        </div>
        <div class="mt-8">
            <input
                    type="text"
                    class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="Type your full name here"
                    wire:model.defer="name"
            />
            @error('name') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>

        <div class="mb-2 mt-4">
            <input
                    type="email"
                    class="rounded-lg border-primary bg-grey border-1 w-full outline-none p-4 text-xl text--primary focus:bg-input"
                    placeholder="{{ __('common.email') }}"
                    wire:model.defer="email"
            />
            @error('email') <p class="text-red-600 mt-2">{{ $message }}</p> @enderror
        </div>
    </div>
    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
        >
            Sign up
        </x-button>
    </div>
    <x-analytics-tracker page="welcome" />
</form>
