@extends('../../layouts/app-admin')

@section('title', 'Editar película - iUMovies')

@section('content_header')
    <h3 class="py-0 mb-4 text-gray-200">Editar película</h3>
@endsection

@section('content')

    <div class="px-4 
                py-3 
                mb-8 
                bg-[#1a1c23]
                rounded-lg 
                shadow-md">

        {!! Form::model($movie, ['route' => ['admin.movies.update', $movie], 'autocomplete' => 'off', 'files' => true, 'method' => 'put']) !!}

            @include('admin.movies.partials.form')

            {!! Form::submit('Actualizar', [ 'class' => "inline-block px-4 py-2 mr-4 bg-green-600 hover:bg-green-700 text-white rounded-lg" ]) !!}

            <a href="{{ route('admin.movies.index') }}" class="text-gray-400 hover:text-gray-500">Regresar</a>

        {!! Form::close() !!}

    </div>

@endsection

@section('js')
    <script src="https://cdn.ckeditor.com/ckeditor5/35.1.0/classic/ckeditor.js"></script>

    <script>
    
        ClassicEditor
        .create( document.querySelector( '#extract' ) )
        .catch( error => {
            console.error( error );
        } );
        
        ClassicEditor
        .create( document.querySelector( '#description' ) )
        .catch( error => {
            console.error( error );
        } );



        // Cambiar imagen
        document.getElementById('img_cover').addEventListener('change', (event) => cambiarImagen(event, 'pictureCover'));
        document.getElementById('img_slide').addEventListener('change', (event) => cambiarImagen(event, 'pictureSlide'));

        // Esta función transforma la imagen que hayamos seleccionado a base 64
        function cambiarImagen(event, idContainer) {
            const file = event.target.files[0];
            const reader = new FileReader();

            reader.onload = ({ target }) => {
                document.getElementById(idContainer).setAttribute('src', target.result);
            }

            reader.readAsDataURL(file);
        }
    
    </script>
@endsection