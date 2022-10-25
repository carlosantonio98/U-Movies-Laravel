<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">

        <!-- Flowbite css -->
        <link rel="stylesheet" href="https://unpkg.com/flowbite@1.5.3/dist/flowbite.min.css" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <!-- Styles -->
        @livewireStyles

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css">

    </head>
    <body class="font-sans antialiased bg-[#000210]">


        @livewire('navigation')

        <!-- Page Content -->
        <main class="min-h-screen text-white">
            {{ $slot }}
        </main>

        <!-- Footer -->
        <footer class="w-full p-3 text-center text-sm text-white bg-gray-700">
            umovies &#169; 2022
        </footer>

        @stack('modals')



        @livewireScripts

        <!-- Flowbite js -->
        <script src="https://unpkg.com/flowbite@1.5.3/dist/flowbite.js"></script>

        @yield('js')


    </body>
</html>