@extends('../../layouts/app-admin')

@section('title', env('APP_NAME'))

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif

    <div class="flex flex-wrap justify-between mb-4">
        <h3 class="py-0">Lista de películas</h3>
        <a href="{{ route('admin.movies.create') }}" class="inline-block px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg">Nueva película</a>
    </div>
    

    <div class="card p-4 mb-4 text-center">

        <h4>Importar peliculas</h4>

        {!! Form::open(['route' => 'admin.movies.import', 'autocomplete' => 'off', 'files' => true]) !!}

            {!! Form::file('fileToUpload', ['class' => 'w-full px-4 py-2 rounded bg-gray-200 mb-2', 'accept' => 'application/vnd.ms-excel,application/vnd.openxmlformats-officedocument.spreadsheetml.sheet']) !!}

            @error('fileToUpload')
                <small class="block text-red-500"><b>{{ $message }}</b></small>
            @enderror

            {!! Form::submit('Importar', [ 'class' => 'inline-block px-4 py-2 m-3 bg-green-600 hover:bg-green-700 text-white rounded-lg']) !!}

        {!! Form::close() !!}
    </div>
@endsection

@section('content')
    @livewire('admin.movie-index')
@endsection