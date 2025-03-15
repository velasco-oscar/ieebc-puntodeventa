<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\ListaDeseo;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        
    View::composer('layouts.navigation', function ($view) {
        $inStockWishlistedCount = 0;
        if (Auth::check() && Auth::user()->cliente) {
            $inStockWishlistedCount = ListaDeseo::where('cliente_id', Auth::user()->cliente->id)
                ->whereHas('producto', function($query) {
                    $query->where('stock', '>', 0);
                })->count();
        }
        $view->with('inStockWishlistedCount', $inStockWishlistedCount);
    });
    }
}
