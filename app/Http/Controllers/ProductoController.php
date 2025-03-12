<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\SoftDeletes; 

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::all();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        return view('productos.create');
    }

    
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric',
            'stock'        => 'required|integer|min:0',
            'proveedor_id' => 'required|exists:proveedors,id', 
        ]);

        Producto::create($validated);

        return redirect()->route('productos.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    
    public function edit(Producto $producto)
    {
        return view('productos.edit', compact('producto'));
    }

    
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric',
            'stock'        => 'required|integer|min:0',
            'proveedor_id' => 'required|exists:proveedors,id',
        ]);

        $producto->update($validated);

        return redirect()->route('productos.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}
