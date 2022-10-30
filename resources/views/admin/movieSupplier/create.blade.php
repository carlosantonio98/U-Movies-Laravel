@extends('../../layouts/app-admin')

@section('title', 'UMovies')

@section('content_header')
    @if (session('info'))
        <p><b>{{ session('info') }}</b></p>
    @endif

    <div class="flex flex-wrap justify-between mb-4">
        <h3 class="py-0">Asignar proveedor</h3>
        <a href="{{ route('admin.movies.index') }}" class="inline-block px-4 py-2 bg-gray-600 hover:bg-gray-700 text-white rounded-lg">Regresar</a>
    </div>

    <div class="card p-4 mb-4 text-center">
        {!! Form::open(['route' => ['admin.movie-supplier.store', $movie]]) !!}

            <div class="grid grid-cols-2 gap-2 mb-2">
                <div>
                    {!! Form::Url('page', null, ['class' => 'w-full px-4 py-2 rounded border-0 outline-0 bg-gray-200 mb-2', 'placeholder' => 'Inserte el url del sitio...']) !!}
                
                    @error('page')
                        <small class="block text-red-500"><b>{{ $message }}</b></small>
                    @enderror
                </div>

                <div>
                    {!! Form::select('supplier', $suppliers, 1, ['class' => 'w-full px-4 py-2 rounded border-0 outline-0 bg-gray-200 mb-2']) !!}
                
                    @error('supplier')
                        <small class="block text-red-500"><b>{{ $message }}</b></small>
                    @enderror
                </div>
            </div>

            {!! Form::submit('Asignar', ['class' => "inline-block px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg"]) !!}
            
        {!! Form::close() !!}
    </div>

@endsection

@section('content')

    <div class="relative overflow-x-auto card">

        <table class="table w-full">

            <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Página</th>
                    <th colspan="2"></th>
                </tr>
            </thead>

            <tbody>
                @forelse ($movie->suppliers as $supplier)
                    <tr>
                        <td>{{ $supplier->id }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->pivot->page }}</td>
                        <td>
                            {!! Form::open(['route' => ['admin.movie-supplier.destroy', $supplier, $movie], 'method' => 'delete']) !!}
                                {!! Form::submit('Eliminar', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) !!}
                            {!! Form::close() !!}
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4">Tabla vacía</td>
                    </tr>
                @endforelse
            </tbody>

        </table>

    </div>

@endsection