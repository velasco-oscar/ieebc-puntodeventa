<?php

namespace App\Http\Controllers;

use App\Models\ListaDeseo;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function index()
    {
        $cliente = Auth::user()->cliente;
        
        if (!$cliente) {
            return redirect()->route('dashboard')->with('error', 'No tienes un cliente asociado.');
        }
        
        $listaDeseos = ListaDeseo::where('cliente_id', $cliente->id)
                        ->with('producto')
                        ->get();
        
        return view('wishlist.index', compact('listaDeseos'));
    }

    public function store(Request $request, Producto $producto)
    {
        try {
            $cliente = Auth::user()->cliente;
            
            if (!$cliente) {
                return redirect()->back()->with('error', 'No tienes un cliente asociado.');
            }

            ListaDeseo::firstOrCreate([
                'cliente_id' => $cliente->id,
                'producto_id' => $producto->id
            ]);

            return redirect()->back()->with('success', 'Producto agregado a tu lista de deseos');

        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error al agregar a la lista: ' . $e->getMessage());
        }
    }

    public function destroy($id)
    {
        $item = ListaDeseo::findOrFail($id);
        
        if ($item->cliente_id !== Auth::user()->cliente->id) {
            abort(403);
        }

        $item->delete();
        return redirect()->back()->with('success', 'Producto removido de tu lista de deseos.');
    }
}