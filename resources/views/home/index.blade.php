@extends('../../layouts/app')

@section('title', 'Umovies | Ver o Descargar Películas Gratis | Encuentra tu película')

@section('description', '¿Ya sabes qué película ver pero no sabes dónde encontrarla? En Umovies, tu sitio online, puede buscar un título y encontrar muchas opciones para ver o descargarlo gratis.')

@section('content')

    @include('movies._carousel-movies')

    <div class="container py-8">
        {{-- Premiere Section --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-regular fa-star"></i> Estrenos</h3>
                @if ($totalPremiereMovies > count($premiereMovies))
                    <a class="text-lg lg:text-sm text-gray-400 group hover:text-gray-300 hover:underline" href="{{ route('movies.premiere') }}">({{ $totalPremiereMovies }}) see all</a>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($premiereMovies as $movie)
                    <x-card-movie :$movie :isPremiere="true"></x-card-movie>
                @empty
                    <p>Sin películas</p>
                @endforelse
            </div>
        </section>

        <hr class="mb-3.5 h-px bg-gray-700 border-0">

        {{-- Last Uppload Section --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-regular fa-clock"></i> Últimas subida</h3>
                @if ($totalMovies > count($latestMoviesUploaded))
                    <a class="text-lg lg:text-sm text-gray-400 group hover:text-gray-300 hover:underline" href="{{ route('movies.new') }}">({{ $totalMovies }}) ver todo</a>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($latestMoviesUploaded as $movie)
                    <x-card-movie :$movie :isPremiere="$movie->premier == 2"></x-card-movie>
                @empty
                    <p>Sin películas</p>
                @endforelse
            </div>
        </section>

        <hr class="mb-3.5 h-px bg-gray-700 border-0">
        
        {{-- Most Visited Movies Section --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-solid fa-magnifying-glass"></i> Películas más visitadas</h3>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($mostVisitedMovies as $visit)
                    <x-card-movie :movie="$visit->movie" :isPremiere="$visit->movie->premier == 2"></x-card-movie>
                @empty
                    <p>Sin películas</p>
                @endforelse
            </div>
        </section>
    </div>

@stop
