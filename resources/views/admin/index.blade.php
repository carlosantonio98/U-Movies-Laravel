@extends('../../layouts/app-admin')

@section('title', 'Dashboard - iUMovies')

@section('content_header')
    <h3 class="py-0 text-gray-200 mb-4">Dashboard</h3>
@stop

@section('content')
    
    <!-- Cards -->
    <div class="grid gap-6 mb-8 md:grid-cols-2 xl:grid-cols-4">

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-orange-100 bg-orange-500">
                <i class="fa-solid fa-eye flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de visitas
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberVisits }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-green-100 bg-green-500">
                <i class="fa-solid fa-film flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de películas
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberMovies }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-blue-100 bg-blue-500">
                <i class="fa-solid fa-list flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de categorías
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberCategories }}
                </p>
            </div>
        </div>

        <!-- Card -->
        <div class="flex items-center p-4 rounded-lg shadow-md bg-[#1a1c23]">
            <div class="p-3 mr-4 rounded-full text-teal-100 bg-teal-500">
                <i class="fa-solid fa-users flex justify-center items-center w-5 h-5"></i>
            </div>
            <div>
                <p class="mb-2 text-sm font-medium text-gray-400" >
                    Total de proveedores
                </p>
                <p class="text-lg font-semibold text-gray-200">
                    {{ $numberSuppliers }}
                </p>
            </div>
        </div>

    </div>

@stop

@section('css')
@stop

@section('js')
@stop