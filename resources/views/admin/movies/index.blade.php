@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif
    
    <div class="flex flex-wrap justify-between mb-4">
        <h1 class="py-0">Lista de películas</h1>
        <a href="{{ route('admin.movies.create') }}" class="inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Nueva película</a>
    </div>
@endsection

@section('content')
    @livewire('admin.movie-index')
@endsection