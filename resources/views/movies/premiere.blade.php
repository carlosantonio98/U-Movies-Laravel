@extends('../../layouts/app')

@php
    $date = date('Y');  
@endphp

@section('title', "Ver películas online $date | lista de películas | " . env('APP_NAME'))

@section('description', "Vea y disfrute del mejor listado de películas de estreno $date que " . env('APP_NAME') . " tiene disponible para ti. Visite y elija su próxima película.")

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