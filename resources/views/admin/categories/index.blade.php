<x-app-layout>

    <h1 class="font-bold text-3xl">Category list</h1>
    <a href="{{ route('admin.categories.create') }}">New category</a>

    <div>
        @livewire('admin.category-index')
    </div>

</x-app-layout>