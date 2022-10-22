{{-- Movies --}}
<div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 mb-8">
    @forelse ($movies as $movie)
        <x-card-movie :$movie :isPremiere="$movie->premier == 2"></x-card-movie>
    @empty
        <p>No movies</p>
    @endforelse
</div>

{{-- Pagination --}}
<div>
    {{ $movies->links() }}
</div>

