<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="@yield('description')">
        <title>@yield('title')</title>

        <link rel="canonical" href="https://{{ strtolower(env('APP_NAME')) }}.com">


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Flowbite css -->
        <link rel="stylesheet" href="{{ asset('libs/flowbite/flowbite.min.css') }}">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        @yield('css')


    </head>
    <body class="font-sans antialiased bg-[#000210]">


        @livewire('navigation')

        <!-- Header content -->
        <header>@yield('content_header')</header>

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

        <!-- Loading -->
        <div id="loading">
            <div id="loading-logo" class="flex items-center font-bold">
                <span class="text-green-600">iU</span>
                <span class="text-white">Movies</span>
            </div>

            <div id="loading-spinner" class="ml-2"></div>
        </div>

        <!-- Scripts -->
        @livewireScripts

        <!-- Flowbite js -->
        <script src="{{ asset('libs/flowbite/flowbite.js') }}"></script>

        @yield('js')

    </body>
</html>