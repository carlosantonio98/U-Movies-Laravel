<x-app-layout>

    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif
    
    <h1 class="font-bold">Create new movie supplier</h1>

    {!! Form::open(['route' => ['admin.movie-supplier.store', $movie]]) !!}

        @include('admin.movieSupplier.partials.form')

        {!! Form::submit('Save', ['class' => "bg-blue-500 hover:bg-blue-400 text-white font-bold py-2 px-4 border-b-4 border-blue-700 hover:border-blue-500 rounded"]) !!}
        <a href="{{ route('admin.movies.index') }}">Go back</a>
        
    {!! Form::close() !!}

    
    @include('admin.movieSupplier.partials.table')
    
</x-app-layout>