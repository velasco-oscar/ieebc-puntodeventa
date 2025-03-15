<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
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
        try {
            $request->validate(['quantity' => 'required|numeric|min:1']);
            
            auth()->user()->cartItems()->updateOrCreate(
                ['producto_id' => $producto->id],
                ['quantity' => $request->quantity]
            );

            return response()->json([
                'success' => true,
                'in_cart' => true
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Error: ' . $e->getMessage()
            ], 500);
        }
    }

    
    public function remove($id)
    {
        $cartItem = \App\Models\CartItem::findOrFail($id);
        $cartItem->delete();
    
        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }
}
