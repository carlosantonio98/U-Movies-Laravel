{{-- Content --}}
<div class="relative card bg-[#1a1c23]">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar una categoría" />

    {{-- Table --}}
    @if ($categories->count())
        <div class="overflow-x-auto">

            <table class="table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>SLUG</th>
                        <th>CREACIÓN</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($categories as $category)
                        <tr>
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->slug }}</td>
                            <td>{{ $category->created_at->format('d/m/Y') }}</td>
                            <td width="10px"><a href="{{ route('admin.categories.show', $category) }}"><i class="fa-solid fa-eye"></i></a></td>
                            <td width="10px"><a href="{{ route('admin.categories.edit', $category) }}"><i class="fa-solid fa-edit"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">Sin registros</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

        <div class="p-4">
            {{ $categories->links() }}
        </div>
    @else
        <strong class="inline-block p-4 text-white">No hay ningún registro ...</strong>
    @endif

</div>
