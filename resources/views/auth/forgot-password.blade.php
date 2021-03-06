<x-guest-layout>
    <div class="container">
        <div class="m-w-100">
            <div class="flex flex-col content-center items-center justify-items-center justify-center pt-6 sm:pt-24 bg-transparent">
                <div>
                    <a href="/">
                        <x-application-m-logo class="w-52 fill-current text-gray-500" />
                    </a>
                </div>

                
                <div class="w-full sm:max-w-md mt-6 px-6 py-4 m-bg-primary-3 m-text-secondary shadow-md overflow-hidden sm:rounded-lg">
                    <div class="mb-4 text-sm m-text-primary">
                        {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                    </div>

                    <!-- Session Status -->
                    <x-auth-session-status class="mb-4" :status="session('status')" />

                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-label for="email" :value="__('Email')" />

                            <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-button>
                                {{ __('Email Password Reset Link') }}
                            </x-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
