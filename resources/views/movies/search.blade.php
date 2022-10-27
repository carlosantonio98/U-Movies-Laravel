@extends('../../layouts/app')

@section('title', 'UMovies | Search movies')

@section('description', 'Descripcion de la pagina')

@section('content')

    <div class="container py-8">
        <section class="mb-8">
            @livewire('index-movie-search')
        </section>
    </div>

@stop