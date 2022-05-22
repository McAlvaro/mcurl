<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </head>
    <body style="background-color: #102131;">
        <div class="font-sans text-gray-900 antialiased">
            <div>
                <div id="shape-left">
                    <x-bg.left-bg class="h-96 w-auto"/>
                </div>
                <div id="shape-right">
                    <x-bg.right-bg  class="m-h-120" />
                </div></div>
                <main>
                    {{ $slot }}
                </main>
                @include('components.footer.footer')
            </div>
            
        </div>
    </body>
</html>
