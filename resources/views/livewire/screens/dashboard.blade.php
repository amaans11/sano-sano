<form class="flex flex-col justify-between min-h-body">
    <div class="h-full px-4 w-full max-w-md mx-auto">
        <div>
            <h1 class="text-2xl font-medium mb-5 text--primary text-center py-10">You are signed in!</h1>

            <p class="text-md font-normal mb-5 text--primary">We are currently under maintence and apologize for the inconvenience. We will notify you as soon as possible.<br><br>Thank you!</p>
        </div>
    </div>
    <div class="flex px-4 w-full max-w-md mx-auto pb-8 mt-4 m-15">
        <x-button
            type="button"
            class="btn--primary w-full mt-2"
        >
            Ok
        </x-button>
    </div>

    <x-analytics-tracker page="dashboard" />
</form>
