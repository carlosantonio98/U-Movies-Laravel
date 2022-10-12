<x-app-layout>

@if (session('info'))
    <p><b>{{ session('info') }}</b></p>
@endif

<h1 class="font-bold">Movies list</h1>

<a href="{{ route('admin.movies.create') }}" class="bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded">New movie</a><br>

<div>
    <table class="w-full">
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
</div>

</x-app-layout>