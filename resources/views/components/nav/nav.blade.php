<nav class="bg-transparent">
    <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
        <div class="relative flex items-center justify-between h-16">
            {{-- <div class="absolute inset-y-0 left-0 flex items-center sm:hidden"> --}}
                {{-- <!-- Mobile Menu --> --}}
                {{-- <button type="button" class="inline-flex"> --}}
                    {{-- <span class="sr-only"> Open Main Menu </span> --}}
                {{-- </button> --}}
            {{-- </div> --}}

            <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-between">
                <div class="flex-shrink-0 flex items-center">
                    <img class="block lg:hidden h-8 w-auto" src="{{ Storage::url('short_mcurl_logo.svg') }}" alt="logo">
                    <img class="hidden lg:block h-8 w-auto" src="{{ Storage::url('mcurl_logo.svg') }}" alt="LogoLG">
                </div>
                <div class="hidden sm:block sm:ml-6">
                    <div class=" flex space-x-4">
                        <a href="#" class="m-bg-primary-1 m-text-secondary px-3 py-2 rounded-md text-sm font-medium" aria-current="page" >Home</a>
                        <a href="#" class="bg-transparent m-text-secondary px-3 py-2 rounded-md text-sm font-medium hover:m-bg-primary-1 hover:m-text-primary" >My URLs</a>
                        <a href="#" class="bg-transparent m-text-secondary px-3 py-2 rounded-md text-sm font-medium hover:m-bg-primary-1 hover:m-text-primary" >Features</a>
                        @auth
                        
                        <a href="#" class="bg-transparent m-text-secondary px-3 py-2 rounded-md text-sm font-medium hover:m-bg-primary-1 hover:m-text-primary" >Account</a>

                        <div class="h-8 w-8 m-bg-primary-2 m-rounded-full focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-white focus:ring-offset-gray-800">
                        <a href="#" >
                            <img class="h-8 w-8 m-rounded-full" src="https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=facearea&facepad=2&w=256&h=256&q=80" alt="">
                        </a>
                        </div>
                        @else

                        <a href="{{ route('register') }}" class="bg-transparent m-text-secondary px-3 py-2 rounded-md text-sm font-medium hover:m-bg-primary-1 hover:m-text-primary" >Sign Up</a>
                        <a href="{{ route('login') }}" class="bg-transparent m-text-secondary px-3 py-2 rounded-md text-sm font-medium hover:m-bg-primary-1 hover:m-text-primary" >Sign In</a>

                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
</nav>
