@if (session('info'))
    <p><b>{{ session('info') }}</b></p>
@endif

<a href="{{ route('admin.movies.create') }}">New movie</a>
<div>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Name</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($movies as $movie)
                <tr>
                    <td>{{ $movie->id }}</td>
                    <td>{{ $movie->name }}</td>
                    <td>
                        <a href="{{ route('admin.movies.show', $movie) }}">View</a>
                        <a href="{{ route('admin.movies.edit', $movie) }}">Edit</a>
                        
                        {!! Form::open(['route' => ['admin.movies.destroy', $movie], 'method' => 'delete']) !!}
                            {!! Form::submit('Delete') !!}
                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Empty table</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>