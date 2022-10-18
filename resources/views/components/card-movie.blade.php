@props(['movie', 'isPremiere'])

{{-- Component card movie --}}

{{-- Movie item --}}
<div class="relative 
    group 
    hover:scale-105 
    transition-transform 
    duration-300 
    ease-out">

    <a href="#">

        {{-- Movie picture --}}
        <div class="relative">

            {{-- Movie figure --}}
            <figure class="relative
                w-full
                pt-[150%]  
                rounded 
                overflow-hidden
              bg-gray-200">{{-- Agregamos el pt para agregar el alto al contenedor de la imagen --}}

                <img src="{{ Storage::url($movie->img_cover) }}" 
                    class="absolute
                        top-0 
                        left-0 
                        w-full 
                        h-full 
                        min-h-[110px] 
                        inline-block 
                        object-cover 
                        group-hover:brightness-50 
                        transition-colors 
                        duration-300 
                        ease-out" 
                    alt="{{ $movie->name }}">

                <span class="absolute 
                    bottom-2 
                    right-2 
                    py-1 
                    px-2
                    rounded 
                    text-[12px] 
                    font-bold
                    text-center
                  bg-blue-700 
                  text-white">
                    2022
                </span>

            </figure>

            @if (isset($isPremiere) && $isPremiere)
                {{-- Movie tag --}}
                <div class="absolute 
                    top-2 
                    right-2 
                    z-10 
                    py-[1px] 
                    px-2
                    rounded
                    text-[12px] 
                    font-bold
                    text-center 
                bg-green-600 
                text-white">
                    Estreno
                </div>
            @endif

            {{-- Movie icon play --}}
            <div class="absolute
                top-[50%]
                left-[50%]
                translate-x-[-50%] 
                translate-y-[-50%] 
                z-10  
                text-3xl
                opacity-0
                group-hover:opacity-100  
                transition-opacity 
                duration-300 
                ease-out 
                fa-solid fa-play  
              text-white">
            </div>

        </div>

        {{-- Movie detail --}}
        <div class="my-1 
            text-sm
            font-bold 
            text-center">
            <p>{{ $movie->name }}</p>
        </div>

    </a>

</div>

