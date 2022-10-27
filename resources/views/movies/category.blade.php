@extends('../../layouts/app')

@section('title', 'UMovies | Category movie')

@section('description', 'Descripcion de la pagina')

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