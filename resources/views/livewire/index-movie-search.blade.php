<div>
    {{-- Input Search --}}
    <div class="relative mb-8">

        {{-- Icon search --}}
        <svg class="absolute -translate-y-1/2 top-1/2 left-5 w-5 h-5 text-gray-500" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path>
        </svg>

        {{-- Input search --}}
        <input wire:model='search' 
            type="text" 
            class="bg-gray-50 
                    border 
                   border-gray-300 
                   text-green-800 
                   text-base 
                   rounded-lg
                   focus:ring-green-500 
                   focus:border-green-500 
                   focus:shadow-lg
                   focus:shadow-green-100
                   w-full 
                   pl-[52px]
                   pr-8
                   py-4"
            placeholder="Search a movie...">
    </div>

    <hr class="mb-8 h-px bg-gray-200 border-0 dark:bg-gray-700">
    
    <div class="flex items-center justify-between flex-wrap gap-2 mb-3.5">
        <h3 class="text-2xl text-gray-700 font-bold">
            <i class="fa-solid fa-clapperboard"></i> 
            {{ !empty($search) ? 'Movies: ' . $search : 'Movies' }}
        </h3>
        <p class="text-sm text-gray-800">{{ $movies->count() }} / {{ $movies->total() }} Movies</p>
    </div>
    
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 mb-8">
        @forelse ($movies as $movie)
            <x-card-movie :$movie :isPremiere="$movie->premier"></x-card-movie>
        @empty
            <p>No movies</p>
        @endforelse
    </div>
    
    {{ $movies->links() }}
</div>

