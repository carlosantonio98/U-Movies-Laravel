{{-- Content --}}
<div class="relative overflow-x-auto card">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar una categoría" />

    {{-- Table --}}
    @if ($categories->count())

        <table class="table w-full">
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Slug</th>
                    <th colspan="2"></th>
                </tr>

            </thead>

            <tbody>

                @forelse ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->slug }}</td>
                        <td width="10px"><a href="{{ route('admin.categories.show', $category) }}">Ver</a></td>
                        <td width="10px"><a href="{{ route('admin.categories.edit', $category) }}">Editar</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Sin registros</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <div class="p-4">
            {{ $categories->links() }}
        </div>
    @else
        <strong class="inline-block p-4">No hay ningún registro ...</strong>
    @endif

</div>
