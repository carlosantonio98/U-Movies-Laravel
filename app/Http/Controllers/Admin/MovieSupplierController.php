<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Movie;
use App\Models\Supplier;

class MovieSupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Movie $movie)
    {
        $suppliers = Supplier::whereNotIn('id', $movie->suppliers->pluck('id'))->pluck('name', 'id');
        return view('admin.movieSupplier.create', compact('movie', 'suppliers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Movie $movie)
    {

        $request->validate([
            'page' => 'required|url',
            'supplier' => 'required'
        ]);

        $movie->suppliers()->attach($request->supplier, ['page' => $request->page, 'created_at' =>now()]);

        return redirect()->route('admin.movie-supplier.create', $movie)->with('info', 'Proveedor vinculado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Movie $movie)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Supplier $supplier, Movie $movie)
    {
        $movie->suppliers()->detach($supplier->id);
        return redirect()->route('admin.movie-supplier.create', $movie)->with('info', 'Proveedor desvinculado con éxito');
    }
}
