<h1>Create a new supplier</h1>

{!! Form::open(['route' => 'admin.suppliers.store', 'files' => true]) !!}
    <div>
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name') !!}

        @error('name')
            <small><b>{{ $message }}</b></small>
        @enderror
    </div>
    
    <div>
        {!! Form::label('slug', 'Slug') !!}
        {!! Form::text('slug') !!}

        @error('slug')
            <small><b>{{ $message }}</b></small>
        @enderror
    </div>

    <div>
        <div>
            <img src="" width="100px" height="100pc" id="pictureLogo">
        </div>

        {!! Form::label('logo', 'Logo') !!}
        {!! Form::file('logo', ['accept' => 'image/*']) !!}

        @error('logo')
            <small><b>{{ $message }}</b></small>
        @enderror
    </div>

    {!! Form::submit('Save') !!}
    <a href="{{ route('admin.suppliers.index') }}">Go back</a>
    
{!! Form::close() !!}

<script>
    // Cambiar imagen
    document.getElementById('logo').addEventListener('change', (event) => cambiarImagen(event, 'pictureLogo'));

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