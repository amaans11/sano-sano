<div class="flex flex-col justify-between min-h-screen">
    <div class="h-full w-full max-w-md mx-auto px-4 py-6 flex flex-row justify-center">
        <img src="{{ asset('images/icons/sano-logo.png') }}" class="h-5 w-32" />
        
    </div>
    <div class="h-full px-4 w-full max-w-md mx-auto">
         <img src="{{ asset('images/icons/hello.gif') }}" style="width:278;height:166;" />
        <div class="mt-8">
            <p class="text-2xl mb-8 text--primary text-center">Help us learn more about our users and customize SanoSano’s interface for your children by answering a few quick questions.</p>
        </div>
        <div class="mt=8">
            <p class=" mb-8 text--primary text-center">We only use your information to create the best user experience.</p>
            <p class=" mb-8 text--primary text-center">Don’t worry, this will take less than 2 minutes.</p>

        </div>

    </div>

    <div  class="h-full px-4 w-full max-w-md mx-auto mb-6" >
        <x-button wire:click="submit" class="w-full btn--primary m-15"  wire:loading.attr="disabled">
            Let's Start!
        </x-button>
    </div>

    <x-analytics-tracker page="welcome" />
</div>
