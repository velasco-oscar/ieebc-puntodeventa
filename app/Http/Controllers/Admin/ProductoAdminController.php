<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Producto;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class ProductoAdminController extends Controller
{
    // Lista todos los productos
    public function index()
    {
        $productos = Producto::orderBy('created_at', 'desc')->get();
        return view('admin.productos.index', compact('productos'));
    }

    // Muestra el formulario para crear un nuevo producto
    public function create()
    {
        $proveedores = Proveedor::all();
        return view('admin.productos.create', compact('proveedores'));
    }

    // Guarda el nuevo producto en la base de datos
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'proveedor_id' => 'required|exists:proveedores,id',
            'imagen'       => 'nullable|url',
        ]);

        Producto::create($validated);

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto creado correctamente.');
    }

    // Muestra la información de un producto específico
    public function show(Producto $producto)
    {
        return view('admin.productos.show', compact('producto'));
    }

    // Muestra el formulario para editar un producto
    public function edit(Producto $producto)
    {
        $proveedores = Proveedor::all();
        return view('admin.productos.edit', compact('producto', 'proveedores'));
    }

    // Actualiza el producto en la base de datos
    public function update(Request $request, Producto $producto)
    {
        $validated = $request->validate([
            'nombre'       => 'required|string|max:255',
            'descripcion'  => 'nullable|string',
            'precio'       => 'required|numeric|min:0',
            'stock'        => 'required|integer|min:0',
            'proveedor_id' => 'required|exists:proveedores,id',
            'imagen'       => 'nullable|url',
        ]);

        $producto->update($validated);

        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto actualizado correctamente.');
    }

    // Elimina el producto
    public function destroy(Producto $producto)
    {
        $producto->delete();
        return redirect()->route('admin.productos.index')
                         ->with('success', 'Producto eliminado correctamente.');
    }
}
