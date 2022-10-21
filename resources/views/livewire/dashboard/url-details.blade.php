<div class="flex flex-col">
    
    <div class="flex flex-col">
        <div class="flex flex-col">
            <div class="flex flex-row justify-between ">
                <p class=" m-text-primary text-2xl font-extrabold "> {{ $url->title }} </p>
                <div class="float-right">
                    <button type="button" class=" my-auto text-blue-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-semibold rounded-lg text-sm px-6 py-1 float-right text-center mr-2">
                            Edit
                    </button>
                </div>

            </div>
            <p>
                <span class="text-sm m-text-secondary font-light" >{{ strtoupper( $url->parseCreatedAt()) }} by</span>
                <a href="#"><span class="text-sm m-text-blue font-light" >{{ ucfirst ( $url->user->name) }}</span></a>
            </p>
        </div>
        <div class=" mt-5">
           <div class="relative">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <span> <x-icons.link class="h-5 w-auto inline" /> </span>
                </div>
                <input id="short_url" type="text" class="block p-4 pl-10 w-full text-base text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 font-semibold" placeholder="Shortlink" value="{{ env('APP_DOMAIN') .'/'. $url->code }}" onclick="shorter.copy_url()" >
                <button type="submit" class="text-blue-700 absolute right-2.5 bottom-2.5 bg-transparent border border-blue-700 hover:bg-blue-800 hover:text-white focus:outline-none focus:ring-0 font-medium rounded-lg text-sm px-4 py-2" onclick="shorter.copy_url()">Copy</button>
            </div> 
        </div>

        <div class="mt-3 mb-3">
            <p class="text-sm" >
                <span class="text-blue-700"><i class="fa-solid fa-right-left"></i></span>
                <span class="font-bold ml-1 m-text-primary" > Destination: </span> 
                <span class="font-light m-text-secondary" > {{ $url->url }} </span> 
            </p> 
        </div>
        <hr class="m-hr-secondary">
        <div class="my-3">
            <div class="flex flex-row justify-start">
                <p class="text-sm font-bold m-text-primary mr-1">Compartir en: </p>
                <x-socialButtons.facebook/>
                <x-socialButtons.whatsapp/>
                <x-socialButtons.twitter/>
                <x-socialButtons.qr/>
            </div>
        </div>
        <hr class="m-hr-secondary" >
        <div class="mt-2">
            <span class="m-text-secondary font-extralight text-sm pt-0 mt-0 mr-2">TOTAL CLICKS:</span>
            <span class="m-text-primary text-xl font-extrabold">{{ $url->click_counter }}</span> 
            <span class="m-text-primary "> <i class="fa-solid fa-chart-simple"></i></span>
        </div>
        <div class="mt-2">
           <livewire:visit-chart/> 
        </div>
        
    </div>
    
</div>
