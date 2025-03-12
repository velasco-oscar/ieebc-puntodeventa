<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutController extends Controller
{
    public function index()
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.producto')->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }
        return view('checkout.index', compact('cart'));
    }
    
    public function store(Request $request)
    {
        $cart = Cart::where('user_id', Auth::id())->with('items.producto')->first();
        if (!$cart || $cart->items->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Tu carrito está vacío.');
        }

        $total = 0;
        foreach ($cart->items as $item) {
            $subtotal = $item->quantity * $item->producto->precio;
            $total += $subtotal;
        }

        $venta = \App\Models\Venta::create([
            'cliente_id' => Auth::user()->cliente->id ?? null,
            'usuario_id' => Auth::id(),
            'total' => $total,
            'fecha' => now(),
        ]);

        foreach ($cart->items as $item) {
            \App\Models\DetalleVenta::create([
                'venta_id' => $venta->id,
                'producto_id' => $item->producto_id,
                'cantidad' => $item->quantity,
                'precio_unitario' => $item->producto->precio,
                'subtotal' => $item->quantity * $item->producto->precio,
            ]);

            $item->producto->decrement('stock', $item->quantity);
        }


        $cart->items()->delete();

        return redirect()->route('checkout.thankyou')->with('venta', $venta);

    }
}
