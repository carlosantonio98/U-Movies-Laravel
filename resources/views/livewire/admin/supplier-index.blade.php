{{-- Content --}}
<div class="relative overflow-x-auto card">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar un proveedor" />

    {{-- Table --}}
    @if ($suppliers->count())

        <table class="table w-full">
            <thead>

                <tr>
                    <th>Id</th>
                    <th>Logo</th>
                    <th>Nombre</th>
                    <th>Permite ver</th>
                    <th>Permite descargar</th>
                    <th colspan="2"></th>
                </tr>

            </thead>

            <tbody>

                @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td><img src="{{ Storage::url($supplier->logo) }}" alt="Supplier logo" class="w-16 h-16 object-cover"></td>
                        <td>{{ $supplier->name }}</td>
                        <td>
                            @if ($supplier->allow_see == 1)
                                <span class="inline-block bg-red-600 text-xs text-white py-1 px-3 rounded-md">
                                    No
                                </span>
                            @else
                                <span class="inline-block bg-green-600 text-xs text-white py-1 px-3 rounded-md">
                                    Si
                                </span>
                            @endif
                        </td>
                        <td>
                            @if ($supplier->allow_download == 1)
                                <span class="inline-block bg-red-600 text-xs text-white py-1 px-3 rounded-md">
                                    No
                                </span>
                            @else
                                <span class="inline-block bg-green-600 text-xs text-white py-1 px-3 rounded-md">
                                    Si
                                </span>
                            @endif
                        </td>
                        <td><a href="{{ route('admin.suppliers.show', $supplier) }}">Ver</a></td>
                        <td><a href="{{ route('admin.suppliers.edit', $supplier) }}">Editar</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Sin registros</td>
                    </tr>
                @endforelse

            </tbody>
        </table>

        <div class="p-4">
            {{ $suppliers->links() }}
        </div>
    
    @else
        <strong class="inline-block p-4">No hay ningún registro ...</strong>
    @endif

</div>