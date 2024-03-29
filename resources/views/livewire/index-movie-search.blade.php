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
            class="bg-gray-800 
                   text-green-400 
                   border 
                   text-base 
                   rounded-lg
                   focus:ring-green-600 
                   focus:border-green-600
                   valid:border-green-600
                   w-full 
                   pl-[52px]
                   pr-8
                   py-4"
            placeholder="Buscar una película..."
            required>
    </div>

    <hr class="mb-3.5 h-px bg-gray-700 border-0">
    
    <div class="flex items-center justify-between flex-wrap gap-2 mb-3.5">
        <h3>
            <i class="fa-solid fa-magnifying-glass"></i> 
            {{ !empty($search) ? 'Búsqueda: ' . $search : 'Búsqueda' }}
        </h3>
        <p class="text-sm text-gray-400">{{ $movies->count() }} / {{ $movies->total() }} Películas</p>
    </div>
    
    <div class="grid grid-cols-2 lg:grid-cols-3 xl:grid-cols-6 gap-5 mb-4">
        @forelse ($movies as $movie)
            <x-card-movie :$movie :isPremiere="$movie->premier"></x-card-movie>
        @empty
            <p>Sin películas</p>
        @endforelse
    </div>
    
    {{ $movies->links() }}
</div>

