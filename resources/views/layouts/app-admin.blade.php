<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">
    <head>


        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <link rel="shortcut icon" href="{{ asset('icono-iumovies.png') }}">


        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        @yield('css')

    </head>
    <body class="font-sans antialiased bg-[#121317]">


        <!-- Loading -->
        <div id="loading">
            <div id="loading-logo" class="flex items-center font-bold">
                <span class="text-green-600">iU</span>
                <span class="text-white">Movies</span>
            </div>

            <div id="loading-spinner" class="ml-2"></div>
        </div>


        <div class="flex h-screen" x-data="{ open: false }">

            <!-- Sidebar -->
            @livewire('admin.sidebar')

            <!-- Backdrop -->
            <div x-show="open"
                 x-transition:enter="transition ease-in-out duration-150"
                 x-transition:enter-start="opacity-0"
                 x-transition:enter-end="opacity-100"
                 x-transition:leave="transition ease-in-out duration-150"
                 x-transition:leave-start="opacity-100"
                 x-transition:leave-end="opacity-0"
                 class="fixed inset-0 z-10 flex items-end bg-black bg-opacity-50 sm:items-center sm:justify-center">
            </div>


            <div class="flex flex-col flex-1 w-full">

                <!-- Appbar -->
                @livewire('admin.appbar')

                <div class="h-full overflow-y-auto">
                    <div class="container py-8">

                        <!-- Header content -->
                        <header>@yield('content_header')</header>

                        <!-- Page content -->
                        <main>@yield('content')</main>

                    </div>
                </div>

            </div>

        </div>

        @stack('modals')


        <!-- Scripts -->
        @livewireScripts

        @yield('js')

    </body>
</html>