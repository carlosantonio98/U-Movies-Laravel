<nav x-data="{ open: false }" class="relative top-0 left-0 z-50 w-full bg-[#000210]">

    <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">

        <div class="relative flex h-16 items-center justify-between">

            <!-- Mobile menu button-->
            <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">

                <button x-on:click=" open = true " type="button" class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">

                    <span class="sr-only">Open main menu</span>
                    <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                    <svg class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>

                </button>

            </div>

            {{-- Logo and pc menu --}}
            <div class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-between">
                
                {{-- Logo --}}
                <div class="flex flex-shrink-0 items-center">
                    <span class="block lg:hidden text-white font-bold text-2xl"><a href="/"><span class="text-green-600">U</span>Movies.</a></span>
                    <span class="hidden lg:block text-white font-bold text-2xl"><a href="/"><span class="text-green-600">U</span>Movies.</a></span>
                </div>
                
                {{-- Pc Menu --}}
                <div class="hidden sm:ml-6 sm:block">
                    <a href="{{route('home')}}" class="@if(request()->routeIs('home')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Home</a>

                    <a href="{{route('movies.index')}}" class="@if(request()->routeIs('movies.index') || request()->routeIs('movies.show')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Movies</a>
                    
                    <a href="{{route('movies.new')}}" class="@if(request()->routeIs('movies.new')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">News</a>
                    
                    <a href="{{route('movies.premiere')}}" class="@if(request()->routeIs('movies.premiere')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium">Premiere</a>

                    {{-- Categories dropdown --}}
                    <div class="relative inline-block text-left" x-data="{ open: false }">
                        <div>
                            <button x-on:click=" open = true " type="button" class="flex @if(request()->routeIs('movies.category')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium" id="menu-button" aria-expanded="true" aria-haspopup="true">
                                
                                Categories
                                <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                                    <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                                </svg>

                            </button>
                        </div>
                        
                        <div x-show="open" x-on:click.away=" open = false " class="absolute right-0 mt-2 w-56 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                            <div class="py-1" role="none">

                                @foreach ($categories as $category)
                                    <a href="{{route('movies.category', $category)}}" class="text-gray-700 hover:text-green-600 block px-4 py-2 text-sm font-medium" role="menuitem" tabindex="-1" id="menu-item-0">{{ $category->name }}</a>
                                @endforeach

                            </div>
                        </div>
                    </div>
                    
                </div>

            </div>

            {{-- Buttons absolutes menu --}}
            <div class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0">

                {{-- Button search --}}
                <a href="{{route('movies.search')}}" class="rounded-full bg-[#000210] p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-[#000210]">
                    <i class="fa-solid fa-magnifying-glass"></i>
                </a>

            </div>

        </div>
    </div>
  

    {{-- Mobile menu --}}
    <div class="sm:hidden" id="mobile-menu" x-show="open" x-on:click.away=" open = false ">
        <div class="space-y-1 px-2 pt-2 pb-3">
            <a href="{{route('home')}}" class="@if(request()->routeIs('home')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif block px-3 py-2 rounded-md text-sm font-medium">Home</a>

            <a href="{{route('movies.index')}}" class="@if(request()->routeIs('movies.index') || request()->routeIs('movies.show')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif block px-3 py-2 rounded-md text-sm font-medium">Movies</a>
            
            <a href="{{route('movies.new')}}" class="@if(request()->routeIs('movies.new')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif block px-3 py-2 rounded-md text-sm font-medium">News</a>
                    
            <a href="{{route('movies.premiere')}}" class="@if(request()->routeIs('movies.premiere')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif block px-3 py-2 rounded-md text-sm font-medium">Premiere</a>

            {{-- Categories dropdown --}}
            <div class="relative w-full inline-block text-left" x-data="{ open: false }">
                <div>
                    <button x-on:click=" open = true " type="button" class="w-full flex justify-between @if(request()->routeIs('movies.category')) bg-green-600 text-white @else text-gray-300 hover:bg-green-600 hover:text-white @endif px-3 py-2 rounded-md text-sm font-medium" id="menu-button" aria-expanded="true" aria-haspopup="true">
                        
                        Categories
                        <svg class="-mr-1 ml-2 h-5 w-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" aria-hidden="true">
                            <path fill-rule="evenodd" d="M5.23 7.21a.75.75 0 011.06.02L10 11.168l3.71-3.938a.75.75 0 111.08 1.04l-4.25 4.5a.75.75 0 01-1.08 0l-4.25-4.5a.75.75 0 01.02-1.06z" clip-rule="evenodd" />
                        </svg>

                    </button>
                </div>
                
                <div x-show="open" x-on:click.away=" open = false " class="absolute left-0  w-full mt-2 origin-top-right rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1">
                    <div class="py-1" role="none">

                        @foreach ($categories as $category)
                            <a href="{{route('movies.category', $category)}}" class="text-gray-700 hover:text-green-600 block px-4 py-2 text-sm font-medium" role="menuitem" tabindex="-1" id="menu-item-0">{{ $category->name }}</a>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>

</nav>  