{{-- Content --}}
<div class="relative overflow-x-auto card">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar una película" />

    {{-- Table --}}
    @if ($movies->count())

        <table class="table w-full">
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Image</th>
                    <th>Nombre</th>
                    <th colspan="4"></th>
                </tr>

            </thead>

            <tbody>

                @forelse ($movies as $movie)
                    <tr>
                        <td>{{ $movie->id }}</td>
                        <td><img class="w-9 h-16 object-cover rounded-sm" src="{{ Storage::url($movie->img_cover) }}" alt="{{ $movie->name }}: portada vertical"></td>
                        <td>{{ $movie->name }}</td>
                        <td width="10px"><a href="{{ route('admin.movies.show', $movie) }}">Ver</a></td>
                        <td width="10px"><a href="{{ route('admin.movies.edit', $movie) }}">Editar</a></td>
                        <td width="10px"><a href="{{ route('admin.movie-supplier.create', $movie) }}">Proveedor</a><br></td>
                        <td width="10px">
                            {!! Form::open(['route' => ['admin.movies.destroy', $movie], 'method' => 'delete']) !!}
                                {!! Form::submit('Eliminar') !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7">Sin registros</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <div class="p-4">
            {{ $movies->links() }}
        </div>
    @else
        <strong class="inline-block p-4">No hay ningún registro ...</strong>
    @endif

</div>