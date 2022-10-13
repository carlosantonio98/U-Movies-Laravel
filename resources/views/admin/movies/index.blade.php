@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif
    
    <h1>Lista de películas</h1>
    <a href="{{ route('admin.movies.create') }}">Nueva película</a>
@endsection

@section('content')
    @livewire('admin.movie-index')
@endsection