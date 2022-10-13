@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')

    <div class="flex flex-wrap justify-between mb-4">
        <h1 class="py-0">Lista de categorías</h1>
        <a href="{{ route('admin.categories.create') }}" class="inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Nueva categoría</a>
    </div>

@endsection

@section('content')
    @livewire('admin.category-index')
@endsection