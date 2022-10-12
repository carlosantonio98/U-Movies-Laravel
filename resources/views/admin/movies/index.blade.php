<x-app-layout>
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif


    <h1 class="font-bold text-3xl">Movie list</h1>
    <a href="{{ route('admin.movies.create') }}">New movie</a>

    <div>
        @livewire('admin.movie-index')
    </div>

</x-app-layout>