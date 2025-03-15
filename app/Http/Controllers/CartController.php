<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);
        return view('cart.index', compact('cart'));
    }

    public function add(Producto $producto, Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:1|max:' . $producto->stock
        ]);

        // Double-check stock availability
        if ($producto->stock < $request->quantity) {
            return response()->json([
                'success' => false,
                'message' => 'No hay suficiente stock disponible'
            ], 422);
        }

        $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);

        // Find existing cart item or create new
        $cartItem = CartItem::firstOrNew([
            'cart_id' => $cart->id,
            'producto_id' => $producto->id
        ]);

        // Update quantity
        $cartItem->quantity += $request->quantity;
        $cartItem->save();

        // Update product stock
        $producto->decrement('stock', $request->quantity);

        return response()->json([
            'success' => true,
            'message' => 'Producto agregado al carrito',
            'new_stock' => $producto->fresh()->stock
        ]);
    }

    public function remove($id)
    {
        $cartItem = CartItem::findOrFail($id);
        
        // Restore stock before removing
        $producto = $cartItem->producto;
        $producto->increment('stock', $cartItem->quantity);
        
        $cartItem->delete();

        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }
}