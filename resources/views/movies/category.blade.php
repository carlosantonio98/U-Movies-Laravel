<x-app-layout>

    <div class="container py-8">

        {{-- Movies --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-solid fa-display"></i> {{ $category->name }}</h3>
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($movies as $movie)
                    <x-card-movie :$movie :isPremiere="$movie->premier == 2"></x-card-movie>
                @empty
                    <p>No movies</p>
                @endforelse
            </div>
        </section>

        {{-- Pagination --}}
        <div>
            {{ $movies->links() }}
        </div>

    </div>

</x-app-layout>