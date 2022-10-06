<h1>Create a new category</h1>

{!! Form::open(['route' => 'categories.store']) !!}
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

    {!! Form::submit('Save') !!}
    <a href="{{ route('categories.index') }}">Go back</a>
    
{!! Form::close() !!}