<nav class="bg-white shadow" x-data="{ open: false }">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex items-center justify-between h-16">
            <!-- Logo e ítems del menú (desktop) -->
            <div class="flex items-center">
                <div class="flex-shrink-0">
                    <a href="{{ route('dashboard') }}">
                        <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Mexicali Card Shop">
                    </a>
                </div>
                <div class="hidden md:block">
                    <div class="ml-10 flex items-baseline space-x-4">
                        <a href="{{ route('productos.index') }}" class="text-gray-900 hover:bg-gray-100 px-3 py-2 rounded-md text-sm font-medium">
                            Productos
                        </a>
                    </div>
                </div>
            </div>

            <!-- Enlaces de autenticación / dropdown (desktop) -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Ícono de Lista de Deseos -->
                <a href="{{ route('wishlist.index') }}" class="relative">
                    <svg class="w-6 h-6 text-gray-900 hover:text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z"></path>
                    </svg>
                </a>
                  <!-- Ícono de Campana para notificaciones -->
                  <a href="{{ route('wishlist.index') }}" class="relative">
                    <svg class="w-6 h-6 text-gray-900 hover:text-gray-700" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V4a2 2 0 10-4 0v1.341C7.67 7.165 6 9.388 6 12v2.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1"></path>
                    </svg>
                    @if($inStockWishlistedCount > 0)
                        <span class="absolute top-0 right-0 inline-flex items-center justify-center px-2 py-1 text-xs font-bold text-white bg-red-600 rounded-full">
                            {{ $inStockWishlistedCount }}
                        </span>
                    @endif
                </a>

                <a href="{{ route('cart.index') }}" class="relative p-2 flex-shrink-0">
    <svg class="w-6 h-7 text-gray-900 hover:text-gray-700" 
         fill="none" 
         stroke="currentColor" 
         stroke-width="2" 
         viewBox="0 0 24 24"
         xmlns="http://www.w3.org/2000/svg">
        <path stroke-linecap="round" 
              stroke-linejoin="round" 
              d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
    </svg>
</a>

                @if(Auth::check())
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button class="flex items-center text-sm font-medium text-gray-900 hover:text-gray-700 focus:outline-none">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-1">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                        <path d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"></path>
                                    </svg>
                                </div>
                            </button>
                        </x-slot>
                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('ventas.mis_ordenes')">
                                {{ __('Pedidos') }}
                            </x-dropdown-link>
                            <x-dropdown-link :href="route('wishlist.index')">
                                {{ __('Lista de Deseos') }}
                            </x-dropdown-link>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                                 onclick="event.preventDefault(); this.closest('form').submit();">
                                    {{ __('Cerrar Sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <a href="{{ route('login') }}" class="text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Log in</a>
                    <a href="{{ route('register') }}" class="ml-4 text-gray-900 hover:text-gray-700 px-3 py-2 rounded-md text-sm font-medium">Register</a>
                @endif
            </div>

            <!-- Botón para menú móvil -->
            <div class="-mr-2 flex md:hidden">
                <button @click="open = !open" type="button" class="bg-white inline-flex items-center justify-center p-2 rounded-md text-gray-900 hover:text-gray-700 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-white focus:ring-gray-900">
                    <span class="sr-only">Open main menu</span>
                    <svg x-show="!open" class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                    </svg>
                    <svg x-show="open" x-cloak class="hidden h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Menú móvil -->
    <div class="md:hidden" x-show="open" @click.away="open = false">
        <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
            <a href="{{ route('productos.index') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Productos</a>
            <a href="{{ route('cart.index') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Carrito</a>
            <a href="{{ route('wishlist.index') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Lista de Deseos</a>
            @if(Auth::check())
                <a href="{{ route('profile.edit') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Perfil</a>
                <a href="{{ route('ventas.mis_ordenes') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Pedidos</a>
                <form method="POST" action="{{ route('logout') }}" class="block">
                    @csrf
                    <button type="submit" class="w-full text-left text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">
                        Cerrar Sesión
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Iniciar Sesión</a>
                <a href="{{ route('register') }}" class="text-gray-900 block px-3 py-2 rounded-md text-base font-medium hover:bg-gray-100">Registrarse</a>
            @endif
        </div>
    </div>
</nav>
