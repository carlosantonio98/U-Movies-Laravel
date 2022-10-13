<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles
        @yield('css')

    </head>
    <body class="font-sans antialiased">
        <x-jet-banner />

        <div class="min-h-screen bg-gray-100">
            @livewire('admin.navigation')

            <div class="container py-8">
                {{-- Header content --}}
                <header>@yield('content_header')</header>
    
                <!-- Body content -->
                <main>@yield('content')</main>
            </div>

        </div>

        @stack('modals')

        {{-- Scripts --}}
        @livewireScripts
        @yield('js')

    </body>
</html>