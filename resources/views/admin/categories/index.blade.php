@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')
    <h1>Lista de categorías</h1>
    <a href="{{ route('admin.categories.create') }}">Nueva categoría</a>
@endsection

@section('content')
    @livewire('admin.category-index')
@endsection