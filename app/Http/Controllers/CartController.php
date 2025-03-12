<?php

namespace App\Http\Controllers;

use App\Models\Cart;
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
       
    }

    
    public function remove($id)
    {
        
    }
}
