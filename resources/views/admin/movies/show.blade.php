<h1>Movie details</h1>
<p>Name: {{ $movie->name }}</p>
<p>Slug: {{ $movie->slug }}</p>
<p>Extract: {!! $movie->extract !!}</p>
<p>Description: {!! $movie->description !!}</p>
<p>Premier: {{ $movie->premier == 1 ? 'Yes':'No' }}</p>

<br>

<p>Images:</p>
<img src="{{Storage::url($movie->img_cover)}}" alt="" width="100px">
<img src="{{Storage::url($movie->img_slide)}}" alt="" width="100px">

<br>

<p>Categories:</p>
<ol>
    @foreach ($movie->categories as $category)
        <li>{{ $category->name }}</li>
    @endforeach
</ol>

<br>

<p>Comments:</p>
<ol>
    @foreach ($movie->comments as $comment)
        <li>{{ $comment->description }}</li>
    @endforeach
</ol>

<br>

<p>Created {{ $movie->created_at->diffForHumans() }}</p>

<a href="{{ route('admin.movies.index') }}">Go back</a>

@can('update', $movie)
    <a href="{{ route('admin.movies.edit', $movie) }}">Edit</a>
@endcan

@can('delete', $movie)
    {!! Form::open(['route' => ['admin.movies.destroy', $movie], 'method' => 'delete']) !!}
        {!! Form::submit('Delete') !!}
    {!! Form::close() !!}
@endcan