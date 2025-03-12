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

    
    public function add(Request $request, $id)
    {
       
    $quantity = $request->input('quantity', 1);

    
    $cart = Cart::firstOrCreate(['user_id' => Auth::id()]);


    $cartItem = CartItem::where('cart_id', $cart->id)
                        ->where('producto_id', $id)
                        ->first();

    if ($cartItem) {
        
        $cartItem->increment('quantity', $quantity);
    } else {
        
        CartItem::create([
            'cart_id' => $cart->id,
            'producto_id' => $id,
            'quantity' => $quantity,
        ]);
    }

    return redirect()->back()->with('success', 'Producto agregado al carrito.');
    }

    
    public function remove($id)
    {
        $cartItem = \App\Models\CartItem::findOrFail($id);
        $cartItem->delete();
    
        return redirect()->back()->with('success', 'Producto eliminado del carrito.');
    }
}
