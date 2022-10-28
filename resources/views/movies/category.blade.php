@extends('../../layouts/app')

@section('title', "Ver películas de $title online | lista de películas | Umovies")

@section('description', "Vea y disfrute del mejor listado de películas del genero de $title que Umovies tiene disponible para ti. Visite y elija su próxima película.")

@section('content')

    <div class="container py-8">

        <section>
            {{-- Title --}}
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-solid fa-display"></i> {{ $title }}</h3>
            </div>

            @include('movies.partials.grid-movies')
        </section>

    </div>

@stop