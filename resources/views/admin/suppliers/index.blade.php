@extends('../../layouts/app-admin')

@section('title', env('APP_NAME'))

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif

    <div class="flex flex-wrap justify-between mb-4">
        <h1 class="py-0">Lista de proveedores</h1>
        <a href="{{ route('admin.suppliers.create') }}" class="inline-block px-4 py-2 bg-gray-200 hover:bg-gray-300 rounded-lg">Nuevo proveedor</a>
    </div>
@endsection

@section('content')
    @livewire('admin.supplier-index')
@endsection