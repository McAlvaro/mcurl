<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="container pt-6">
        <div class="w-full">
            <div class="w-2/5">
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="flex">
                                <input id="long_url" type="text" placeholder="Pegar Url Aquí" class="w-full px-4 py-3 rounded">

                                <button class="bg-gray-800 ml-4 w-auto px-6 py-3 font-semibold text-white rounded" onclick="shorter.short_url()" > <span>Acortar</span> </button>

                            </div>

                            <div id="short_url_container" class="flex py-5" style="display: none;">
                                <input id="short_url" type="text" placeholder="" class="w-full px-4 py-3 rounded" onclick="shorter.copy_url()">
                            </div>

                        </div>
                    </div>

                    <div class="w-full mt-4 m-h-25r m-bg-primary-3 overflow-y-scroll">
                        <div class="relative shadow-md">
                            <table class="table w-full text-sm text-left">
                                <thead>
                                    <tr>
                                        <th scope="col" class="px-6 py-3 border-t">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach( $urls as $url )
                                        <tr class="border-t">
                                            <td scope="row" class="px-6 py-4 m-text-primary font-medium whitespace-nowrap">
                                                {{ $url->code }}
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
