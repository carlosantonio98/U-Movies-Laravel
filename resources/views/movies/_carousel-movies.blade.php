<div class="relative">
    {{-- Carousel --}}
    <div class="relative min-h-[152px] overflow-hidden sm:h-72 xl:h-96">
        {{-- Items --}}
        @foreach ($latestPremiereMovies as $movie)
            <div id="{{ $movie['idCarouselItem'] }}" class="hidden duration-700 ease-in-out">
                <span class="absolute text-sm md:text-lg font-semibold text-white text-center -translate-x-1/2 bottom-10 left-1/2  z-10">{{ $movie['name'] }}</span>
                <a href="#">
                    <img src="{{ Storage::url($movie['image']) }}" class="block h-full w-full object-cover" alt="Movie cover">
                </a>
            </div>
        @endforeach
    </div>
    {{-- Slider indicators --}}
    <div class="absolute z-30 flex space-x-3 -translate-x-1/2 bottom-5 left-1/2">
        @foreach ($latestPremiereMovies as $movie)
            <button id="{{ $movie['idCarouselIndicator'] }}" type="button" class="w-3 h-3 rounded-full" aria-current="{{ $loop->first ? 'true' : 'false' }}" aria-label="Slide 1"></button>
        @endforeach
    </div>
</div>

@section('js')
    @parent

    <script>
        const itemsCarousel = [];
        const itemsIndicatorCarousel = [];
        
        const latestPremiereMovies = JSON.parse(JSON.stringify({!! json_encode($latestPremiereMovies) !!}));
        latestPremiereMovies.forEach(movie => {
            itemsCarousel.push({
                position: movie.position,
                el: document.getElementById(movie.idCarouselItem)
            });
            
            itemsIndicatorCarousel.push({
                position: movie.position,
                el: document.getElementById(movie.idCarouselIndicator)
            });
        });

        const optionsCarousel = {
            activeItemPosition: 1,
            interval: 5000,
            
            indicators: {
                activeClasses: 'bg-white dark:bg-gray-800',
                inactiveClasses: 'bg-white/50 dark:bg-gray-800/50 hover:bg-white dark:hover:bg-gray-800',
                items: itemsIndicatorCarousel
            },
        };

        const carousel = new Carousel(itemsCarousel, optionsCarousel);
        carousel.cycle();
    </script>
@endsection