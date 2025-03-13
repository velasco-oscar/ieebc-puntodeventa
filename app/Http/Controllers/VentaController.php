<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function misOrdenes()
    {
        // Suponiendo que cada usuario tiene un cliente asociado a través de una relación
        $clienteId = Auth::user()->cliente->id ?? null;

        if (!$clienteId) {
            return redirect()->route('dashboard')->with('error', 'No tienes un cliente asociado.');
        }

        // Obtenemos las ventas del cliente, junto con los detalles y productos
        $ventas = Venta::where('cliente_id', $clienteId)
                       ->with('detalleVentas.producto')
                       ->orderBy('fecha', 'desc')
                       ->get();

        return view('ventas.mis_ordenes', compact('ventas'));
    }
}
