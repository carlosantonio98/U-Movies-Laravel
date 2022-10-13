@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif

    <h1>Lista de proveedores</h1>
    <a href="{{ route('admin.suppliers.create') }}">Nuevo proveedor</a>
@endsection

@section('content')
    @livewire('admin.supplier-index')
@endsection