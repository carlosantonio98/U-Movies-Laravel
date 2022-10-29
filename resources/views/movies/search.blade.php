@extends('../../layouts/app')

@section('title', 'Búsqueda Inteligente de películas | Umovies')

@section('description', 'Busque una película y seleccione el sitio de su agrado para poder obtenerlo gratis.')

@section('content')

    <div class="container py-8">
        <section class="mb-8">
            @livewire('index-movie-search')
        </section>
    </div>

@stop