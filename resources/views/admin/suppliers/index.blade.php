@extends('../../layouts/app-admin')

@section('title', 'Proveedores - iUMovies')

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

        <h3 class="py-0 text-gray-200">Proveedores</h3>
        <a href="{{ route('admin.suppliers.create') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Nuevo proveedor</a>
    </div>

@endsection

@section('content')
    @livewire('admin.supplier-index')
@endsection