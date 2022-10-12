<div>

    <div>
        <input wire:model='search' type="text" class="form-control" placeholder="Insert the movie name">
    </div>

    @if ($movies->count())
        <table class="w-full table">
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th colspan="4">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td>{{ $movie->name }}</td>
                        <td><a href="{{ route('admin.movies.show', $movie) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">View</a></td>
                        <td><a href="{{ route('admin.movies.edit', $movie) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Edit</a></td>
                        <td><a href="{{ route('admin.movie-supplier.create', $movie) }}" class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">Supplier</a><br></td>
                        <td>
                            {!! Form::open(['route' => ['admin.movies.destroy', $movie], 'method' => 'delete']) !!}
                                {!! Form::submit('Delete', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) !!}
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

        {{ $movies->links() }}
    @else
        <strong>No hay ningún registro ...</strong>
    @endif

</div>