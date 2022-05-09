<div class="flex-col sm:justify-center px-auto justify-center items-center pt-8 sm:pt-8 bg-transparent">
    <div class="container px-auto py-auto">
        <div>
           {{ $logo }}
        </div>

        <div class="w-full sm:max-w-md mt-6 px-6 py-4 m-bg-primary-3 m-text-secondary shadow-md overflow-hidden sm:rounded-lg">
            {{ $slot }}
        </div>
    </div>
</div>
