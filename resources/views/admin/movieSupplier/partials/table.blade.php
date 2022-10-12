<table class="table w-full">

    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Page</th>
            <th colspan="2">Actions</th>
        </tr>
    </thead>

    <tbody>
        @forelse ($movie->suppliers as $supplier)
            <tr>
                <td>{{ $supplier->id }}</td>
                <td>{{ $supplier->name }}</td>
                <td>{{ $supplier->pivot->page }}</td>
                <td>
                    {!! Form::open(['route' => ['admin.movie-supplier.destroy', $supplier, $movie], 'method' => 'delete']) !!}
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