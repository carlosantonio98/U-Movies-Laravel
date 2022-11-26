@extends('../../layouts/app-admin')

@section('title', 'Películas - iUMovies')

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
                
        <h3 class="py-0 text-gray-200">Películas</h3>
        <a href="{{ route('admin.movies.create') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Nueva película</a>
    </div>
    

    <div class="card p-4 mb-8 bg-[#1a1c23]">

        {!! Form::open(['route' => 'admin.movies.import', 'autocomplete' => 'off', 'files' => true]) !!}

            <div class="flex">
                <div class="w-[70%] lg:w-[90%]">
                    {!! Form::file('fileToUpload', ['class' => 'w-full px-4 py-2 rounded-lg rounded-r-none bg-gray-200', 'accept' => 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']) !!}
                </div>
    
                {!! Form::submit('Importar', [ 'class' => 'w-[30%] lg:w-[10%] px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg rounded-l-none']) !!}
            </div>
            
            @error('fileToUpload')
                <small class="block text-red-500 mt-1"><b>{{ $message }}</b></small>
            @enderror

        {!! Form::close() !!}
    </div>
@endsection

@section('content')
    @livewire('admin.movie-index')
@endsection