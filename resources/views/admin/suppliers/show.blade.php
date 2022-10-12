<h1>Supplier details</h1>
<img src="{{ Storage::url($supplier->logo) }}" alt="Supplier logo">
<p>Name: {{ $supplier->name }}</p>
<p>Slug: {{ $supplier->slug }}</p>
<p>Created {{ $supplier->created_at->diffForHumans() }}</p>

<a href="{{ route('admin.suppliers.index') }}">Go back</a>

@can('update', $supplier)
    <a href="{{ route('admin.suppliers.edit', $supplier) }}">Edit</a>
@endcan