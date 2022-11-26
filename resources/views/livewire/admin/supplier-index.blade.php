{{-- Content --}}
<div class="relative card bg-[#1a1c23]">

    {{-- Search --}}
    <x-input-filter :search="$search" placeholder="Buscar un proveedor" />

    {{-- Table --}}
    @if ($suppliers->count())
        <div class="overflow-x-auto">

            <table class="table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>LOGO</th>
                        <th>NOMBRE</th>
                        <th>VER</th>
                        <th>DESCARGAR</th>
                        <th>CREACIÓN</th>
                        <th colspan="2">ACCIONES</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td><img src="{{ Storage::url($supplier->logo) }}" alt="Supplier logo" class="w-24 h-16 object-cover"></td>
                            <td>{{ $supplier->name }}</td>
                            <td>
                                <small class="px-4 py-1 
                                              rounded-full 
                                              text-white
                                              {{ $supplier->allow_see == 2 ?  'bg-green-700' : 'bg-red-700' }}">

                                    {{ $supplier->allow_see == 2 ? 'Si' : 'No' }}
                                </small>
                            </td>
                            <td>
                                <small class="px-4 py-1 
                                             rounded-full 
                                             text-white
                                             {{ $supplier->allow_download == 2 ?  'bg-green-700' : 'bg-red-700' }}">
                                    
                                    {{ $supplier->allow_download == 2 ? 'Si' : 'No' }}
                                </small>
                            </td>
                            <td>{{ $supplier->created_at->format('d/m/Y') }}</td>
                            <td width="10px"><a href="{{ route('admin.suppliers.show', $supplier) }}"><i class="fa-solid fa-eye"></i></a></td>
                            <td width="10px"><a href="{{ route('admin.suppliers.edit', $supplier) }}"><i class="fa-solid fa-edit"></i></a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8">Sin registros</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

        <div class="p-4">
            {{ $suppliers->links() }}
        </div>
    
    @else
        <strong class="inline-block p-4 text-white">No hay ningún registro ...</strong>
    @endif

</div>