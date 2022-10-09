<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\MovieRequest;

use App\Models\Category;
use App\Models\Movie;

use Illuminate\Support\Facades\Storage;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', new Movie);

        $movies = Movie::latest('id')->get();

        return view('admin.movies.index', compact('movies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.movies.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MovieRequest $request)
    {
        $this->authorize('create', new Movie);

        $movie = new Movie($request->validated());
        $movie->user_id = Auth::id();

        if ($request->file('img_cover') && $request->file('img_slide')) {
            $movie->img_cover = Storage::put('covers', $request->file('img_cover'));
            $movie->img_slide = Storage::put('slides', $request->file('img_slide'));
        }
        
        $movie->save();

        if ($request->categories) {
            $movie->categories()->attach($request->categories);
        }

        return redirect()->route('admin.movies.edit', $movie)->with('info', 'Se ha creado con éxito');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Movie $movie)
    {
        $movie->load('comments');

        return view('admin.movies.show', compact('movie'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Movie $movie)
    {
        $categories = Category::all();

        return view('admin.movies.edit', compact('movie', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MovieRequest $request, Movie $movie)
    {
        $this->authorize('update', $movie);

        $movie->fill($request->validated());

        if ($request->file('img_cover')) {
            Storage::delete($movie->img_cover);
            $movie->img_cover = Storage::put('covers', $request->file('img_cover'));
        }
        
        if ($request->file('img_slide')) {
            Storage::delete($movie->img_slide);
            $movie->img_slide = Storage::put('slides', $request->file('img_slide'));
        }
    
        $movie->save();

        if ($request->categories) {
            $movie->categories()->sync($request->categories);
        }

        return redirect()->route('admin.movies.edit',  $movie)->with('info', 'Se ha actualizado con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Movie $movie)
    {
        $this->authorize('delete', $movie);

        $movie->delete();

        return redirect()->route('admin.movies.index')->with('info', 'Se ha eliminado con éxito');
    }
}
