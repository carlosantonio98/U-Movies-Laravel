<div class="z-10 
            py-4
            px-4
            md:px-0 
            shadow-md 
            bg-[#1a1c23]">

    <div class="container
                flex 
                items-center
                justify-between 
                h-full
                text-green-200">


        <!-- Mobile hamburger -->
        <button class="p-1 
                       mr-5 
                       -ml-1 
                       rounded-md 
                       xl:hidden 
                       focus:outline-none 
                       focus:ring 
                       focus:ring-green-300"
                x-on:click=" open = true "
                aria-label="Menu">

            <i class="fa-solid fa-bars w-6 h-6 text-base"></i>

        </button>


        <!-- Search input -->
        <div class="flex 
                    justify-center 
                    flex-1 
                    lg:mr-32">

            <div class="relative 
                        w-full 
                        max-w-xl 
                        mr-6 
                        focus-within:text-green-500">

                <div class="absolute 
                            inset-y-0 
                            flex 
                            items-center 
                            pl-2">

                    <i class="fa-solid fa-search w-4 h-4 text-xs"></i>
                </div>

                <input class="w-full 
                              pl-8 
                              pr-2 
                              text-sm 
                              text-gray-200 
                              placeholder-gray-500 
                              bg-[#24262d] 
                              border-0 
                              rounded-md 
                              focus:placeholder-gray-600 
                              focus:outline-none 
                              focus:ring 
                              focus:ring-green-300
                              form-input"
                       type="text"
                       placeholder="Buscar por nombre de película"
                       aria-label="Search"/>
            </div>
        </div>

        <!-- Items list -->
        <ul class="flex 
                   items-center 
                   flex-shrink-0 
                   space-x-6">

            <!-- Notifications menu -->
            <li class="relative" x-data="{ open: false }">

                <button class="relative 
                               align-middle 
                               rounded-md 
                               focus:outline-none 
                               focus:ring 
                               focus:ring-green-200"
                        x-on:click=" open = true "
                        aria-label="Notifications"
                        aria-haspopup="true">

                    <i class="fa-solid fa-bell w-5 h-5 text-sm"></i>

                    <!-- Notification badge -->
                    <span aria-hidden="true"
                          class="absolute 
                                 top-0 
                                 right-0 
                                 inline-block 
                                 w-3 
                                 h-3 
                                 transform 
                                 translate-x-1 
                                 -translate-y-1 
                                 bg-red-600 
                                 border-2 
                                 border-gray-800 
                                 rounded-full">
                    </span>
                </button>

                <ul x-show=" open "
                    x-on:click.away=" open = false "
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute 
                           right-0 
                           w-56 
                           p-2 
                           mt-2 
                           space-y-2 
                           text-gray-300 
                           bg-gray-700
                           border 
                           border-gray-700 
                           rounded-md 
                           shadow-md">

                    <li class="flex">
                        <a class="inline-flex 
                                  items-center 
                                  justify-between 
                                  w-full 
                                  px-2 
                                  py-1 
                                  text-sm 
                                  font-semibold 
                                  transition-colors 
                                  duration-150 
                                  rounded-md 
                                  hover:bg-gray-800 
                                  hover:text-gray-200"
                            href="#">

                            <span>Buzón de sugerencias</span>
                            <span class="inline-flex 
                                            items-center 
                                            justify-center 
                                            px-2 
                                            py-1 
                                            text-xs 
                                            font-bold 
                                            leading-none 
                                            text-red-100 
                                            bg-red-600 
                                            rounded-full">

                                13

                            </span>
                        </a>
                    </li>

                    <li class="flex">
                        <a class="inline-flex 
                                  items-center 
                                  justify-between 
                                  w-full 
                                  px-2 
                                  py-1 
                                  text-sm 
                                  font-semibold 
                                  transition-colors 
                                  duration-150 
                                  rounded-md 
                                  hover:bg-gray-800 
                                  hover:text-gray-200"
                            href="#">

                            <span>Comentarios</span>
                            <span class="inline-flex 
                                            items-center 
                                            justify-center 
                                            px-2 
                                            py-1 
                                            text-xs 
                                            font-bold 
                                            leading-none 
                                            text-red-100 
                                            bg-red-600 
                                            rounded-full">

                                2

                            </span>
                        </a>
                    </li>

                    <li class="flex">
                        <a class="inline-flex 
                                  items-center 
                                  justify-between 
                                  w-full 
                                  px-2 
                                  py-1 
                                  text-sm 
                                  font-semibold 
                                  transition-colors 
                                  duration-150 
                                  rounded-md 
                                  hover:bg-gray-800 
                                  hover:text-gray-200"
                            href="#">

                            <span>Alertas</span>
                        </a>
                    </li>

                </ul>

            </li>


            <!-- Profile menu -->
            <li class="relative" x-data="{ open: false }">

                <button class="align-middle 
                               rounded-full 
                               focus:outline-none 
                               focus:ring 
                               focus:ring-green-200"
                        x-on:click=" open = true "
                        aria-label="Account"
                        aria-haspopup="true">

                    <img class="object-cover w-8 h-8 rounded-full"
                         src="https://images.unsplash.com/photo-1502378735452-bc7d86632805?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&w=200&fit=max&s=aa3a807e1bbdfd4364d1f449eaa96d82"
                         alt=""
                         aria-hidden="true"/>

                </button>

                <ul x-show=" open "
                    x-on:click.away=" open = false "
                    x-transition:leave="transition ease-in duration-150"
                    x-transition:leave-start="opacity-100"
                    x-transition:leave-end="opacity-0"
                    class="absolute 
                           right-0 
                           w-56 
                           p-2 
                           mt-2 
                           space-y-2 
                           text-gray-300 
                           bg-gray-700 
                           border 
                           border-gray-700 
                           rounded-md 
                           shadow-md"
                    aria-label="submenu">

                    <li class="flex">
                        <a class="inline-flex 
                                  items-center 
                                  w-full 
                                  px-2 
                                  py-1 
                                  text-sm 
                                  font-semibold 
                                  transition-colors 
                                  duration-150 
                                  rounded-md 
                                  hover:bg-gray-800 
                                  hover:text-gray-200"
                            href="{{ route('profile.show') }}">

                            <i class="fa-solid fa-user w-4 h-4 mr-3"></i>

                            <span>Perfil</span>

                        </a>
                    </li>

                    <li class="flex">
                        <form method="POST" action="{{ route('logout') }}" x-data  class="w-full">
                            @csrf

                            <a class="inline-flex 
                                      items-center 
                                      w-full 
                                      px-2 
                                      py-1 
                                      text-sm 
                                      font-semibold 
                                      transition-colors 
                                      duration-150 
                                      rounded-md 
                                      hover:bg-gray-800 
                                      hover:text-gray-200"
                                href="{{ route('logout') }}"
                                @click.prevent="$root.submit();">

                                <i class="fa-solid fa-arrow-right-from-bracket w-4 h-4 mr-3"></i>

                                <span>Cerrar sesión</span>

                            </a>
                        </form>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>