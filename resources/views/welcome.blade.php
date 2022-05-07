            {{-- @if (Route::has('login')) --}}
                {{-- <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block"> --}}
                    {{-- @auth --}}
                        {{-- <a href="{{ url('/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Dashboard</a> --}}
                    {{-- @else --}}
                        {{-- <a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a> --}}

                        {{-- @if (Route::has('register')) --}}
                            {{-- <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a> --}}
                        {{-- @endif --}}
                    {{-- @endauth --}}
                {{-- </div> --}}
            {{-- @endif --}}

<x-app-layout>
    <div class="m-container w-full h-full">
    
        <div class="w-full flex flex-row items-center justify-between">
           <div class="m-w-50">
               <div class="m-text-primary py-20 px-10">
                    <p class="text-xl">Welcome to</p>
                    <p class="text-5xl font-extrabold"> MCURL </p>
                    <p class="text-xl mt-3">Create a free account to enjoy:</p>
                    <div class="mt-6 flex text-xl" >
                    
                        <ol>
                             <li>
                                 <span><i class="fa-solid fa-check mr-1"></i> Easy Link Shortening </span>
                             </li>
                             <li class="mt-2"> 
                                 <span><i class="fa-solid fa-check mr-1"></i> Link History </span>
                             </li>
                             <li class="mt-2">
                                 <span><i class="fa-solid fa-check mr-1"></i> Counter of Clicks </span>
                             </li>
                        </ol>
                    </div>
                    <div class="ml-7 mt-7">
                        <button class="m-text-primary text-xl font-semibold m-rounded-full px-7 py-2.5 text-center bg-gradient-to-tr m-from-pink m-to-blue" >Get Started for Free</button>
                    </div>
               </div>  
           </div>
           <div class="m-w-50">
                {{-- <div id="shadow-first"></div> --}}
                {{-- <div id="shadow-secondary"></div> --}}
               {{-- <img id="laptop-img" class="ml-10 m-h-3r w-auto" src="{{ Storage::url('Laptop.png') }}" alt=""> --}}
               <x-laptop/>
           </div>
        </div>
    </div>
</x-app-layout>
