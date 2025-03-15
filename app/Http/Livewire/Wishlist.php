<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\ListaDeseo;
use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class Wishlist extends Component
{
    public $wishlistItems = [];

    public function mount()
    {
        $this->loadWishlist();

    }

    public function loadWishlist()
    {
        $user = Auth::user();
        if ($user && $user->cliente) {
            $this->wishlistItems = ListaDeseo::where('cliente_id', $user->cliente->id)
                ->with('producto')
                ->get();
        } else {
            $this->wishlistItems = collect();
        }
    }

    public function addToCart($productoId)
    {
        try {
            $user = Auth::user();
            if (!$user) return;
    
            $cart = Cart::firstOrCreate(['user_id' => $user->id]);
    
            $cartItem = CartItem::where('cart_id', $cart->id)
                ->where('producto_id', $productoId)
                ->first();
    
            if ($cartItem) {
                $cartItem->increment('quantity');
            } else {
                CartItem::create([
                    'cart_id' => $cart->id,
                    'producto_id' => $productoId,
                    'quantity' => 1,
                    // Add any required missing columns here
                ]);
            }
    
            session()->flash('message', 'Producto agregado al carrito.');
            $this->emit('cartUpdated');
        } catch (\Exception $e) {
            \Log::error('Cart error: ' . $e->getMessage());
            session()->flash('error', 'Error adding to cart: ' . $e->getMessage());
        }
    }

    public function removeItem($wishlistId)
    {
        ListaDeseo::where('id', $wishlistId)->delete();
        session()->flash('message', 'Producto eliminado de la lista de deseos.');
        $this->loadWishlist(); 
    }

    public function render()
    {
        return view('livewire.wishlist')
            ->layout('layouts.app'); 
    }
}