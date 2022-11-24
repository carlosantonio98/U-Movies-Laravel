{{-- Content --}}
<div class="relative card bg-[#1a1c23]">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar una película" />

    {{-- Table --}}
    @if ($movies->count())
        <div class="overflow-x-auto">

            <table class="table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>IMAGEN</th>
                        <th>NOMBRE</th>
                        <th>AÑO</th>
                        <th>ESTRENO</th>
                        <th>CREACIÓN</th>
                        <th colspan="3">ACCIONES</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($movies as $movie)
                        <tr>
                            <td>{{ $movie->id }}</td>
                            <td><img class="w-9 h-16 object-cover rounded-sm" src="{{ Storage::url($movie->img_cover) }}" alt="{{ $movie->name }}: portada vertical"></td>
                            <td>{{ $movie->name }}</td>
                            <td>{{ $movie->year }}</td>
                            <td>
                                <small 
                                    class="px-4 py-1 
                                        rounded-full 
                                        text-white 
                                        {{ $movie->premier == 2 ? 'bg-green-700' : 'bg-red-700' }}">

                                    {{ $movie->premier == 2 ? 'Si' : 'No' }}
                                </small>
                            </td>
                            <td>{{ $movie->created_at->format('d/m/Y') }}</td>
                            <td width="10px"><a href="{{ route('admin.movies.show', $movie) }}"><i class="fa-solid fa-eye"></i></a></td>
                            <td width="10px"><a href="{{ route('admin.movies.edit', $movie) }}"><i class="fa-solid fa-edit"></i></a></td>
                            <td width="10px"><a href="{{ route('admin.movie-supplier.create', $movie) }}"><i class="fa-solid fa-users-between-lines"></i></a><br></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9">Sin registros</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

        <div class="p-4">
            {{ $movies->links() }}
        </div>

    @else
        <strong class="inline-block p-4 text-white">No hay ningún registro ...</strong>
    @endif

</div>