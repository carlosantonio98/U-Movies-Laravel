<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('viewAny', new Supplier);

        $suppliers = Supplier::all();

        return view('admin.suppliers.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', new Supplier);

        return view('admin.suppliers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $supplier = new Supplier($request->all());

        $this->authorize('create', $supplier);

        $request->validate([
            'name' => 'required',
            'slug' => 'required|unique:suppliers',
            'logo' => 'required|image'
        ]);

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $supplier->logo = Storage::put('logos', $request->file('logo'));
        }

        $supplier->save();
        
        return redirect()->route('admin.suppliers.show', $supplier);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Supplier $supplier)
    {
        $this->authorize('view', $supplier);

        return view('admin.suppliers.show', compact('supplier'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        return view('admin.suppliers.edit', compact('supplier'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Supplier $supplier)
    {
        $this->authorize('update', $supplier);

        $request->validate([
            'name' => 'required',
            'slug' => "required|unique:suppliers,slug,$supplier->id",
            'logo' => $request->hasFile('logo') ? 'required|image' : 'nullable'
        ]);

        $supplier->fill($request->all());

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            Storage::delete($supplier->logo);
            $supplier->fill($request->all());
            $supplier->logo = Storage::put('logos', $request->file('logo'));
        }
        
        $supplier->save();

        return redirect()->route('admin.suppliers.show', $supplier);
    }
}
