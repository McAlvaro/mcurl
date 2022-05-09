<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link rel="icon" href="{{ Storage::url('short_mcurl_logo.svg') }}" type="image/svg+xml">
        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Styles -->
        {{-- <link rel="stylesheet" href="{{ asset('css/app.css') }}"> --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- Scripts -->
        {{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

    </head>
    <body style="background-color: #102131;" class="font-sans antialiased">
        <div style="max-height: 100%;" class=" h-screen min-h-screen max-h-screen">
           @include('components.nav.nav') 
            {{-- <img id="shape-two" src="{{ Storage::url('BG.png') }}" alt=""> --}}
            {{-- <img id="shape-first" src="{{ Storage::url('BG2.png') }}" alt=""> --}}
            <div id="shape-first">
                <svg class="fixed-svg-height" viewBox="0 0 1363 709" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g filter="url(#filter0_d_0_8)">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M316.402 -1189.94C354.63 -1232.93 421.162 -1234.88 461.843 -1194.2L1284.21 -371.84C1323.26 -332.788 1323.26 -269.471 1284.21 -230.419L425.255 628.532C401.403 652.384 367.133 662.604 334.112 655.712L-895.969 398.969C-971.214 383.264 -1001.34 292.073 -950.269 234.631L316.402 -1189.94Z" fill="#1F2B44"/>
                    </g>
                    <defs>
                    <filter id="filter0_d_0_8" x="-1024.62" y="-1270.49" width="2387.12" height="1979.32" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB">
                    <feFlood flood-opacity="0" result="BackgroundImageFix"/>
                    <feColorMatrix in="SourceAlpha" type="matrix" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/>
                    <feOffset dy="2"/>
                    <feGaussianBlur stdDeviation="24.5"/>
                    <feColorMatrix type="matrix" values="0 0 0 0 0.0627451 0 0 0 0 0.129412 0 0 0 0 0.192157 0 0 0 1 0"/>
                    <feBlend mode="normal" in2="BackgroundImageFix" result="effect1_dropShadow_0_8"/>
                    <feBlend mode="normal" in="SourceGraphic" in2="effect1_dropShadow_0_8" result="shape"/>
                    </filter>
                    </defs>
                </svg>
            </div>
            <div id="shape-two" >
                <svg class="fixed-svg-height" viewBox="0 0 1440 599" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g style="mix-blend-mode:lighten" opacity="0.326959">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M1375.38 -2360.85C1408.56 -2411.35 1478.61 -2421.11 1524.33 -2381.6L2591.22 -1459.74C2635.87 -1421.15 2637.58 -1352.49 2594.89 -1311.74L653.712 541.277C635.867 558.311 612.354 568.149 587.695 568.897L-380.742 598.272C-461.651 600.726 -511.798 511.05 -467.346 443.402L1375.38 -2360.85Z" fill="#253659"/>
                    </g>
                </svg>
            </div>
            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            @include('components.footer.footer')
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}" defer></script>
    </body>
</html>
