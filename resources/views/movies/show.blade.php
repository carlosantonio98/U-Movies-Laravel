@extends('../../layouts/app')

@section('title', 'UMovies | Show movie')

@section('description', 'Descripcion de la pagina')

@section('content')

    {{-- Details movie --}}
    <article class="relative 
        w-full 
        min-h-min-[1000px] 
        text-white">

        {{-- Info movie --}}
        <div class="container 
            pt-32 
            pb-16">

            {{-- Image cover --}}
            <figure class="w-[185px] 
                h-[275px] 
                rounded 
                overflow-hidden 
                bg-gray-800">

                <img class="w-full 
                    h-full 
                    object-cover" 
                    src="{{ Storage::url($movie->img_cover) }}" 
                    alt="{{$movie->name}}_cover">
            </figure>

            {{-- Movie name --}}
            <header>
                <h2 class="text-white">{{ $movie->name }} ({{ $movie->year }})</h2>
            </header>

            {{-- Movie tags --}}
            <footer class="flex
                flex-wrap 
                items-center
                justify-start
                gap-2">

                <span class="text-sm">{{ $movie->created_at->format('d/m/Y') }}</span>

                <i class="fas fa-calendar mr-4"></i>

                @foreach ($movie->categories as $category)
                    <a href="{{route('movies.category', $category)}}" 
                        class="flex
                            py-1 
                            px-2
                            rounded-full
                            text-sm
                            bg-blue-700 
                            hover:bg-blue-800  
                            transition-colors 
                            duration-300 
                            ease-out">

                        {{ $category->name }}
                    </a>
                @endforeach

                <i class="fas fa-tag"></i>

            </footer>

            <div class="text-sm mt-4">{!! $movie->description !!}</div>
        </div>

        {{-- Image slide --}}
        <div class="absolute 
            top-0 
            left-0 
            -z-10 
            w-full 
            h-full 
            after:content-['']  
            after:absolute 
            after:top-0 
            after:left-0 
            after:block 
            after:w-full 
            after:h-full
            after:bg-gradient-to-t 
            after:from-[#000210]
            after:via-[#00021060]
            after:to-[#000210]">

            <figure>
                <img class="absolute 
                    top-0 
                    left-0 
                    -z-10
                    block 
                    w-full 
                    h-full
                    brightness-50
                    object-cover"  
                    src="{{ Storage::url($movie->img_slide) }}" 
                    alt="{{$movie->name}}_slide">
            </figure>
        </div>
    </article>

    {{-- Trailer --}}
    <article class="container 
        py-16 
        font-bold 
        text-center 
        text-white">

        <h3>Trailer</h3>

        <iframe class="w-full 
            aspect-video 
            rounded" 
            src="{{$movie->trailer}}">
        </iframe>
    </article>

    {{-- Suppliers --}}
    <article class="container 
        py-16 
        font-bold 
        text-center 
        text-white">

        <h3>Ver o descargar película</h3>

        <div class="flex 
            flex-wrap 
            justify-center 
            items-center 
            gap-5">

            @foreach ($movie->suppliers as $supplier)
                <a class="w-60 
                    h-40 
                    group
                    rounded 
                    overflow-hidden
                    hover:scale-105 
                    transition-transform 
                    duration-300 
                    ease-out" 
                    href="{{ $supplier->pivot->page }}">

                    <img class="w-full
                        h-full 
                        object-cover
                        group-hover:brightness-50 
                        transition-colors 
                        duration-300 
                        ease-out" 
                        src="{{ Storage::url($supplier->logo) }}" 
                        alt="supplier_img">
                </a>
            @endforeach
        </div>
    </article>

    {{-- Other movies --}}
    <article class="container 
        py-16 
        font-bold 
        text-center 
        text-white">

        <h3>Nuevos</h3>

        <div class="grid 
            grid-cols-2 
            lg:grid-cols-3 
            xl:grid-cols-6 
            gap-5">

            @foreach ($movies as $otherMovie)
                <x-card-movie :movie="$otherMovie"  />
            @endforeach
        </div>

    </article>

@stop