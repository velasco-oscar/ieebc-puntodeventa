<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proveedor;

class ProveedorAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    $proveedores = Proveedor::all();
    return view('admin.proveedores.index', compact('proveedores'));
}



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.proveedores.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    $validated = $request->validate([
        'nombre' => 'required|string|max:255',
        'email' => 'required|email|unique:proveedores,email',
        'telefono' => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
    ]);

    Proveedor::create($validated);

    return redirect()->route('admin.proveedores.index')
                     ->with('success', 'Proveedor creado exitosamente');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Proveedor $proveedor)
{
    return view('admin.proveedores.edit', compact('proveedor'));
}


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Proveedor $proveedor)
{
    $validated = $request->validate([
        'nombre'    => 'required|string|max:255',
        'email'     => 'required|email|max:255',
        'telefono'  => 'nullable|string|max:20',
        'direccion' => 'nullable|string|max:255',
    ]);

    $proveedor->update($validated);

    return redirect()->route('admin.proveedores.index')
                     ->with('success', 'Proveedor actualizado correctamente.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
