<x-app-layout>
    
    @include('movies._carousel-movies')

    <div class="container py-8">
        {{-- Premiere Section --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3 class="text-2xl text-gray-700 font-bold"><i class="fa-regular fa-star"></i> Premiere</h3>
                @if ($totalPremiereMovies > count($premiereMovies))
                    <a class="text-lg lg:text-sm text-gray-800 hover:underline" href="#">({{ $totalPremiereMovies }}) see all</a>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($premiereMovies as $movie)
                    <x-card-movie :$movie :isPremiere="true"></x-card-movie>
                @empty
                    <p>No movies</p>
                @endforelse
            </div>
        </section>

        <hr class="mb-8 h-px bg-gray-200 border-0 dark:bg-gray-700">

        {{-- Last Uppload Section --}}
        <section class="mb-8">
            <div class="flex items-center justify-between mb-3.5">
                <h3 class="text-2xl text-gray-700 font-bold"><i class="fa-regular fa-clock"></i> Latest Uploaded</h3>
                @if ($totalMovies > count($latestMoviesUploaded))
                    <a class="text-lg lg:text-sm text-gray-800 hover:underline" href="#">({{ $totalMovies }}) see all</a>
                @endif
            </div>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($latestMoviesUploaded as $movie)
                    <x-card-movie :$movie></x-card-movie>
                @empty
                    <p>No movies</p>
                @endforelse
            </div>
        </section>

        <hr class="mb-8 h-px bg-gray-200 border-0 dark:bg-gray-700">
        
        {{-- Most Visited Movies Section --}}
        <section class="mb-8">
            <h3 class="text-2xl text-gray-700 font-bold mb-3.5"><i class="fa-solid fa-magnifying-glass"></i> Most Visited Movies</h3>
            <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5">
                @forelse ($mostVisitedMovies as $visit)
                    <x-card-movie :movie="$visit->movie" :isPremiere="$visit->movie->premier == 2"></x-card-movie>
                @empty
                    <p>No movies</p>
                @endforelse
            </div>
        </section>
    </div>

</x-app-layout>