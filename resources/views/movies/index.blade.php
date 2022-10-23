<x-app-layout>

    <div class="container py-8">

        <section>
            {{-- Title --}}
            <div class="flex items-center justify-between mb-3.5">
                <h3><i class="fa-solid fa-display"></i> {{ $title }}</h3>
            </div>
        
            @include('movies.partials.grid-movies')
        </section>

    </div>

</x-app-layout>