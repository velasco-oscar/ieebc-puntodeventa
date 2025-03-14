<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\VentaController;
use App\Http\Controllers\DetalleVentaController;
use App\Http\Controllers\ListaDeseoController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\WishlistController;
use App\Http\Livewire\Wishlist; 


Route::get('/', function () {
    return view('welcome');
});

require __DIR__.'/auth.php';

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('clientes', ClienteController::class);
    Route::resource('productos', ProductoController::class);
    Route::resource('proveedores', ProveedorController::class);
    Route::resource('ventas', VentaController::class);
    Route::resource('detalle_ventas', DetalleVentaController::class);
    Route::resource('lista_deseos', ListaDeseoController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
    Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
    Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkout.index');
    Route::post('/checkout', [CheckoutController::class, 'store'])->name('checkout.store');
    Route::get('/checkout/thankyou', function () {
        return view('checkout.thankyou');
    })->name('checkout.thankyou');


    Route::get('/mis-ordenes', [VentaController::class, 'misOrdenes'])->name('ventas.mis_ordenes');

    Route::post('/wishlist/add/{producto}', [WishlistController::class, 'store'])
     ->name('wishlist.add');

     Route::delete('/wishlist/remove/{id}', [WishlistController::class, 'destroy'])
     ->name('wishlist.remove');

    Route::get('/wishlist', Wishlist::class)->name('wishlist.index');
});
