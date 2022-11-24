<!-- Desktop sidebar -->
<aside class="z-20 
              hidden 
              w-64 
              overflow-y-auto 
              bg-[#1a1c23]
              xl:block 
              flex-shrink-0">

    <div class="py-4
                text-gray-400">


        <!-- Logo sidebar -->
        <a class="ml-6 
                  text-lg 
                  font-bold 
                  text-gray-200"
           href="#"><span class="text-green-600">iU</span>Movies.
        </a>


        <!-- Item dashboard sidebar -->
        <ul class="mt-6">
            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.home') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                      aria-hidden="true">
                </span>
            
                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.home') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.home') }}">

                    <i class="fa-solid fa-house"></i>

                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>


        <!-- Items sidebar -->
        <ul>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.movies*') ? 'bg-green-600' : '' }} 
                             rounded-tr-lg 
                             rounded-br-lg"
                      aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.movies*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.movies.index') }}">

                   <i class="fa-solid fa-film"></i>

                    <span class="ml-4">Películas</span>
                </a>
            </li>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.categories*') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                      aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.categories*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.categories.index') }}">

                   <i class="fa-solid fa-list"></i>

                    <span class="ml-4">Categorías</span>
                </a>
            </li>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.suppliers*') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                      aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.suppliers*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.suppliers.index') }}">

                   <i class="fa-solid fa-users"></i>

                    <span class="ml-4">Proveedores</span>
                </a>
            </li>

        </ul>
    

        <!-- Button add -->
        <div class="px-6 my-6">
            <button class="flex 
                           items-center 
                           justify-between 
                           w-full 
                           px-4 
                           py-2 
                           text-sm 
                           font-medium 
                           leading-5 
                           text-white 
                           transition-colors 
                           duration-150 
                           bg-green-600 
                           border 
                           border-transparent 
                           rounded-lg 
                           active:bg-green-600 
                           hover:bg-green-700 
                           focus:outline-none 
                           focus:shadow-outline-purple">

                Crear película
                <span class="ml-2" aria-hidden="true">+</span>

            </button>
        </div>
    </div>
</aside>


<!-- Mobile sidebar -->
<aside class="fixed 
              inset-y-0 
              z-20 
              flex-shrink-0 
              w-64 
              mt-16 
              overflow-y-auto 
              bg-[#1a1c23] 
              xl:hidden"
       x-cloak
       x-show="open"
       x-on:click.away=" open = false "
       x-transition:enter="transition ease-in-out duration-150"
       x-transition:enter-start="opacity-0 transform -translate-x-20"
       x-transition:enter-end="opacity-100"
       x-transition:leave="transition ease-in-out duration-150"
       x-transition:leave-start="opacity-100"
       x-transition:leave-end="opacity-0 transform -translate-x-20">

    <div class="py-4
                text-gray-400">


        <!-- Logo sidebar -->
        <a class="ml-6 
                  text-lg 
                  font-bold 
                  text-gray-200"
           href="#"><span class="text-green-600">iU</span>Movies.
        </a>


        <!-- Item dashboard sidebar -->
        <ul class="mt-6">
            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.home') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                       aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.home') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.home') }}">

                    <i class="fa-solid fa-house"></i>

                    <span class="ml-4">Dashboard</span>
                </a>
            </li>
        </ul>


        <!-- Items sidebar -->
        <ul>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.movies*') ? 'bg-green-600' : '' }} 
                             rounded-tr-lg 
                             rounded-br-lg"
                       aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.movies*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.movies.index') }}">

                    <i class="fa-solid fa-film"></i>

                    <span class="ml-4">Películas</span>
                </a>
            </li>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.categories*') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                       aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.categories*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.categories.index') }}">

                    <i class="fa-solid fa-list"></i>

                    <span class="ml-4">Categorías</span>
                </a>
            </li>

            <li class="relative 
                       px-6 
                       py-3">

                <span class="absolute 
                             inset-y-0 
                             left-0 
                             w-1 
                             {{ request()->routeIs('admin.suppliers*') ? 'bg-green-600' : '' }}
                             rounded-tr-lg 
                             rounded-br-lg"
                      aria-hidden="true">
                </span>

                <a class="inline-flex 
                          items-center 
                          w-full 
                          text-sm 
                          font-semibold 
                          {{ request()->routeIs('admin.suppliers*') ? 'text-white' : '' }}
                          transition-colors 
                          duration-150 
                          hover:text-white"
                   href="{{ route('admin.suppliers.index') }}">

                    <i class="fa-solid fa-users"></i>

                    <span class="ml-4">Proveedores</span>
                </a>
            </li>

        </ul>


        <!-- Button add -->
        <div class="px-6 my-6">
            <button class="flex 
                           items-center 
                           justify-between 
                           w-full 
                           px-4 
                           py-2 
                           text-sm 
                           font-medium 
                           leading-5 
                           text-white 
                           transition-colors 
                           duration-150 
                           bg-green-600 
                           border 
                           border-transparent 
                           rounded-lg 
                           active:bg-green-600 
                           hover:bg-green-700 
                           focus:outline-none 
                           focus:shadow-outline-purple">

                Crear película
                <span class="ml-2" aria-hidden="true">+</span>

            </button>
        </div>
    </div>

</aside>