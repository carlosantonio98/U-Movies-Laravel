<x-app-layout>

    <h1 class="font-bold text-3xl">Supplier list</h1>
    <a href="{{ route('admin.suppliers.create') }}">New supplier</a>

    <div>
        @livewire('admin.supplier-index')
    </div>

</x-app-layout>