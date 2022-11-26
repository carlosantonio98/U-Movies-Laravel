@extends('../../layouts/app-admin')

@section('title', 'Agregar proveedor a película - iUMovies')

@section('content_header')
    @if (session('info'))
        <div class="w-full 
                    px-4 
                    py-2 
                    rounded
                    font-bold 
                    bg-green-600 
                    text-white">

            <p>{{ session('info') }}</p>
        </div>
    @endif

    <div class="flex 
                flex-wrap 
                justify-between
                items-center 
                mb-4">
                
        <h3 class="py-0 text-gray-200">Asignar proveedor</h3>
        <a href="{{ route('admin.movies.index') }}" class="text-gray-400 hover:text-gray-500">Regresar</a>
    </div>

    <div class="card p-4 mb-8 bg-[#1a1c23]">

        {!! Form::open(['route' => ['admin.movie-supplier.store', $movie]]) !!}

            <div class="flex flex-wrap">
                <div class="w-full md:w-[35%] mb-4 md:mb-0">
                    {!! Form::Url('page', null, [ 'class' => 'w-full px-4 py-2 rounded-lg md:rounded-r-none bg-gray-200', 'placeholder' => 'Inserte el url del sitio...' ]) !!}
                </div>

                <div class="w-full md:w-[35%] mb-4 md:mb-0">
                    {!! Form::select('supplier', $suppliers, 1, ['class' => 'w-full px-4 py-2 rounded-lg md:rounded-l-none md:rounded-r-none bg-gray-200']) !!}
                </div>
    
                {!! Form::submit('Asignar', [ 'class' => 'w-[30%] px-4 py-2 mb-4 md:mb-0 bg-green-600 hover:bg-green-700 text-white rounded-lg md:rounded-l-none']) !!}
            </div>
            
            @error('supplier')
                <small class="form-error-custom mt-1"><b>{{ $message }}</b></small>
            @enderror

        {!! Form::close() !!}

    </div>
@endsection

@section('content')

    {{-- Content --}}
    <div class="relative card bg-[#1a1c23]">

        <div class="overflow-x-auto">

            {{-- Table --}}
            <table class="table">
                <thead>

                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>PÁGINA</th>
                        <th>ACCIONES</th>
                    </tr>

                </thead>

                <tbody>

                    @forelse ($movie->suppliers as $supplier)
                        <tr>
                            <td>{{ $supplier->id }}</td>
                            <td>{{ $supplier->name }}</td>
                            <td>{{ $supplier->pivot->page }}</td>
                            <td width="10px">

                                {!! Form::open(['route' => ['admin.movie-supplier.destroy', $supplier, $movie], 'method' => 'delete']) !!}
                                    {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'p-2 rounded-lg font-medium text-gray-400 hover:text-white focus:outline-none focus:ring focus:ring-gray-400']) !!}
                                {!! Form::close() !!}

                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4">Sin registros</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>

        </div>

    </div>

@endsection