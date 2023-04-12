<form form wire:submit.prevent="submit" class="flex flex-col flex-grow justify-between min-h-body  w-full max-w-md mx-auto px-4 py-6">
    <div class="h-full w-full max-w-md mx-auto"></div>
    <div class="w-full max-w-md mx-auto">
        <div class="flex flex-row justify-center">
            <img src="{{ asset('images/icons/thankyou.gif') }}" class="mb-4" style="width:180px;height:180px" />
        </div>
        <h1 class="text-4xl font-bold text--primary mb-8">Thank you for signing up!</h1>
        <span class="text--primary text-xl">We're building <span class="font-bold">SanoSano</span>  for people like you, that's why we're excited to have you try it out for yourself.</span>
        <p class="text--primary text-xl pt-4">We plan to share our new app with you soon.</p>
    </div>
    <div class="flex justify-end w-full max-w-md mx-auto pt-4 m-15">
        <x-button
                type="submit"
                class="btn--primary w-full ml-2"
                wire:loading.attr="disabled"
        >
            Ok
        </x-button>
    </div>
</form>
