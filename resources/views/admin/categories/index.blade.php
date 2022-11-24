@extends('../../layouts/app-admin')

@section('title', 'Categorías - iUMovies')

@section('content_header')
    @if (session('info'))
        <div class="w-full 
                    px-4 
                    py-2 
                    rounded
                    font-bold 
                    bg-green-600 
                    text-white">

            <p>{{ session('info') }}</p>
        </div>
    @endif

    <div class="flex 
                flex-wrap 
                justify-between 
                mb-4">

        <h3 class="py-0 text-gray-200">Categorías</h3>
        <a href="{{ route('admin.categories.create') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Nueva categoría</a>
    </div>

@endsection

@section('content')
    @livewire('admin.category-index')
@endsection