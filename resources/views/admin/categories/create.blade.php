@extends('../../layouts/app-admin')

@section('title', 'Crear categoría - iUMovies')

@section('content_header')
    <h3 class="py-0 mb-4 text-gray-200">Crear categoría</h3>
@endsection

@section('content')

    <div class="px-4 
                py-3 
                mb-8 
                bg-[#1a1c23]
                rounded-lg 
                shadow-md">

        {!! Form::open(['route' => 'admin.categories.store']) !!}


            <div class="form-group-custom">

                {!! Form::label('name', 'Nombre', [ 'class' => 'form-label-custom' ]) !!}

                {!! Form::text('name', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese una categoría' ]) !!}

                @error('name')
                    <small class="form-error-custom">{{ $message }}</small>
                @enderror

            </div>

            <div class="form-group-custom">

                {!! Form::label('slug', 'Slug', [ 'class' => 'form-label-custom' ]) !!}

                {!! Form::text('slug', null, [ 'class' => 'form-input-custom', 'placeholder' => 'Ingrese un slug', 'readonly' ]) !!}

                @error('slug')
                    <small class="form-error-custom">{{ $message }}</small>
                @enderror

            </div>

            {!! Form::submit('Guardar', [ 'class' => "inline-block px-4 py-2 mr-4 bg-green-600 hover:bg-green-700 text-white rounded-lg" ]) !!}
            
            <a href="{{ route('admin.categories.index') }}" class="text-gray-400 hover:text-gray-500">Regresar</a>
            
        {!! Form::close() !!}

    </div>

@endsection

@section('js')

    <!-- Script slug -->
    <script src="{{ asset('libs/jQuery-Plugin-stringToSlug-1.3/jquery.stringToSlug.min.js') }}"></script>

    <script>

        // Crea el slug con el nombre
        $("#name").stringToSlug({
            setEvents: 'keyup keydown blur',
            getPut: '#slug',
            space: '-'
        });

    </script>

@endsection