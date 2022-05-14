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

                    <div id="short_url_container" class="flex flex-row" style="display: none;">
                        <div class="flex flex-row">
                        <div class="flex flex-row w-11/12">
                        <input id="title" type="text" placeholder="" class="w-1/2 px-4 mx-2 rounded">
                        <input id="short_url" type="text" placeholder="" class="w-1/2 px-4 mx-2  rounded" onclick="shorter.copy_url()">
                        </div>
                        <div class="w-1/12">
                        <button class="bg-gray-800 ml-4 w-auto px-3 py-2 font-semibold text-white rounded" onclick="shorter.short_url()" > <span>Save</span> </button>
                        </div>
                        </div>
                    </div>

                </div>
            </div>
            <hr>
            <div class="w-2/5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="w-full px-2 mt-4 m-max-h-25r m-bg-primary-3 overflow-y-scroll custom-scroll">

                        <div class="relative">
                            <table class="table w-full text-sm text-left">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6">

                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $urls as $url )
                                        <tr class="border-t">
                                            <td scope="row" class="px-6 py-4 m-text-primary font-medium whitespace-nowrap">
                                                <span class="text-xs m-text-secondary font-light" >{{ strtoupper( $url->parseCreatedAt()) }}</span> <br>
                                                <span class="text-base font-semibold">Title </span> <br>
                                                <span class="font-bold">{{ env('APP_DOMAIN').'/'. $url->code }}</span>
                                                <span class="float-right"> 30 <i class="fa-solid fa-chart-simple ml-1"></i></span>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="w-3/5">
            </div>
        </div>
    </div>
</x-app-layout>
