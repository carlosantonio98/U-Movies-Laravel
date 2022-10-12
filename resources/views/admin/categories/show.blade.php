<h1>Category details</h1>
<p>Name: {{ $category->name }}</p>
<p>Slug: {{ $category->slug }}</p>
<p>Created {{ $category->created_at->diffForHumans() }}</p>

<a href="{{ route('admin.categories.index') }}">Go back</a>

@can('update', $category)
    <a href="{{ route('admin.categories.edit', $category) }}">Edit</a>
@endcan

@can('delete', $category)
    {!! Form::open(['route' => ['admin.categories.destroy', $category], 'method' => 'delete']) !!}
        {!! Form::submit('Delete') !!}
    {!! Form::close() !!}
@endcan