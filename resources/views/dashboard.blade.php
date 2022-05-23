<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container pt-1">
        <div class="w-full h-full m-bg-primary-3 px-2">
            <div class="overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-5">
                    <div id="create_container" class="flex">
                        <input id="long_url" type="text" placeholder="Pegar Url Aquí" class="w-full py-0 text-sm px-4 rounded">
                        <button class="bg-gray-800 ml-4 w-auto px-3 py-2 font-semibold text-white rounded" onclick="shorter.short_url()" > <span>Shorten</span> </button>

                    </div>

                </div>
            </div>
            <hr class="m-hr-secondary">
            <div class="flex flex-row">
                <div class="w-2/5">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="w-full px-2 mt-4 m-max-h-25r m-bg-primary-3 overflow-y-scroll custom-scroll">

                            <livewire:dashboard.list-urls/>
                        </div> 
                    </div>
                </div>
                <div class="w-3/5">
                    <div class="min-w-full max-w-full">
                        <div class="mt-3 px-4 py-5">
                            <livewire:dashboard.url-details/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
