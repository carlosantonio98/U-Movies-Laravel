@if (session('info'))
    <p><b>{{ session('info') }}</b></p>
@endif

<h1>Create a new movie</h1>

{!! Form::open(['route' => 'admin.movies.store', 'autocomplete' => 'off', 'files' => true]) !!}

    @include('admin.movies.partials.form')

    {!! Form::submit('Save') !!}
    <a href="{{ route('admin.movies.index') }}">Go back</a>
    
{!! Form::close() !!}



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