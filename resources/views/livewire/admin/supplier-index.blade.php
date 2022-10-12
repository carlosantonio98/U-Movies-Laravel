<div>

    <div>
        <input wire:model='search' type="text" class="form-control" placeholder="Insert the supplier name">
    </div>

    @if ($suppliers->count())
        <table>
            <thead>
                <tr>
                    <th>Id</th>
                    <th>Logo</th>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td><img src="{{ Storage::url($supplier->logo) }}" alt="Supplier logo"></td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->slug }}</td>
                        <td>
                            <a href="{{ route('admin.suppliers.show', $supplier) }}">View</a>
                            <a href="{{ route('admin.suppliers.edit', $supplier) }}">Edit</a>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5">Empty table</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        {{ $suppliers->links() }}
    @else
        <strong>No hay ningún registro ...</strong>
    @endif

</div>