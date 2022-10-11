<h1>Edit category</h1>

{!! Form::model($category, ['route' => ['admin.categories.update', $category], 'method' => 'put']) !!}
    <div>
        {!! Form::label('name', 'Name') !!}
        {!! Form::text('name', ) !!}

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

    {!! Form::submit('Save changes') !!}
    <a href="{{ route('admin.categories.index') }}">Go back</a>
    
{!! Form::close() !!}