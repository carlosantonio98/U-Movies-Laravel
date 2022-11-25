@extends('../../layouts/app-admin')

@section('title', 'Editar categoría - iUMovies')

@section('content_header')
    <h3 class="py-0 mb-4 text-gray-200">Editar categoría</h3>
@endsection

@section('content')

    <div class="px-4 
                py-3 
                mb-8 
                bg-[#1a1c23]
                rounded-lg 
                shadow-md">

        {!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}


            <div class="text-sm mb-4">

                {!! Form::label('name', 'Nombre', [ 'class' => 'form-label-custom' ]) !!}

                {!! Form::text('name', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese una categoría' ]) !!}

                @error('name')
                    <small class="form-error-custom">{{ $message }}</small>
                @enderror

            </div>

            <div class="text-sm mb-4">

                {!! Form::label('slug', 'Slug', [ 'class' => 'form-label-custom' ]) !!}

                {!! Form::text('slug', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese un slug', 'readonly' ]) !!}

                @error('slug')
                    <small class="form-error-custom">{{ $message }}</small>
                @enderror

            </div>

            {!! Form::submit('Actualizar', [ 'class' => "inline-block px-4 py-2 mr-4 bg-green-600 hover:bg-green-700 text-white rounded-lg" ]) !!}
            
            <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-gray-500">Regresar</a>
            
        {!! Form::close() !!}

    </div>

@endsection