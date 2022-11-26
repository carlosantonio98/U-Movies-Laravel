<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>
        
        <link rel="canonical" href="{{ env('APP_URL') }}/">
        <link rel="shortcut icon" href="{{ asset('icono-iumovies.png') }}">


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Flowbite css -->
        <link rel="stylesheet" href="{{ asset('libs/flowbite/flowbite.min.css') }}">

        <!-- Styles -->
        @vite(['resources/css/app.css'])

        @livewireStyles

        @yield('css')
        
        <!-- Scripts -->
        <script src="{{ asset('libs/jquery/jquery-3.6.1.min.js') }}"></script>

        @vite(['resources/js/app.js'])

        @production
            <!-- Google tag (gtag.js) -->
            <script async src="https://www.googletagmanager.com/gtag/js?id=G-WH7NSLMNMM"></script>
            <script>
                window.dataLayer = window.dataLayer || [];
                function gtag(){dataLayer.push(arguments);}
                gtag('js', new Date());

                gtag('config', 'G-WH7NSLMNMM');
            </script>
        @endproduction


    </head>
    <body class="font-sans antialiased bg-[#000210]">


        <!-- Loading -->
        <div id="loading">
            <div id="loading-logo" class="flex items-center font-bold">
                <span class="text-green-600">iU</span>
                <span class="text-white">Movies</span>
            </div>

            <div id="loading-spinner" class="ml-2"></div>
        </div>

        @livewire('navigation')

        <!-- Page content -->
        <main class="min-h-screen text-white">@yield('content')</main>

        <!-- Footer content -->
        <footer class="w-full p-3 text-center text-sm text-white bg-gray-700">
            {{ env('APP_NAME') }} &#169; 2022
        </footer>

        @stack('modals')

        <!--Scroll top --> 
        <a href="#" class="scrolltop" id="scroll-top">
            <i class="fa-solid fa-chevron-up scrolltop__icon"></i>
        </a>


        <!-- Scripts -->
        @livewireScripts

        <!-- Flowbite js -->
        <script src="{{ asset('libs/flowbite/flowbite.js') }}"></script>

        @yield('js')


    </body>
</html>