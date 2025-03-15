<header class="absolute inset-x-0 top-0 z-50">
    <nav class="flex items-center justify-between p-6 lg:px-8" aria-label="Global">
        <div class="flex lg:flex-1">
            <a href="#" class="-m-1.5 p-1.5">
                <span class="sr-only">Your Company</span>
                <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Mexicali Card Shop">
            </a>
        </div>
        <div class="flex lg:hidden">
            <button @click="isOpen = true" type="button" class="-m-2.5 inline-flex items-center justify-center rounded-md p-2.5 text-gray-700">
                <span class="sr-only">Open main menu</span>
                <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                </svg>
            </button>
        </div>
        <div class="hidden lg:flex lg:gap-x-12">
            <a href="{{ route('productos.index') }}" class="text-sm font-semibold text-gray-900">Productos</a>
            
            
            <a href="{{ route('register') }}" class="text-sm font-semibold text-gray-900">Registrarse</a>

            <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900">Iniciar Sesión <span aria-hidden="true">&rarr;</span></a>
        </div>
    </nav>
    <!-- Menú móvil -->
    <div class="lg:hidden" x-show="isOpen" x-cloak role="dialog" aria-modal="true" @keydown.escape.window="isOpen = false">
        <div class="fixed inset-0 z-50 bg-black/25" x-show="isOpen" @click="isOpen = false"></div>
        <div class="fixed inset-y-0 right-0 z-50 w-full overflow-y-auto bg-white px-6 py-6 sm:max-w-sm sm:ring-1 sm:ring-gray-900/10">
            <div class="flex items-center justify-between">
                <a href="#" class="-m-1.5 p-1.5">
                    <span class="sr-only">Your Company</span>
                    <img class="h-12 w-auto" src="{{ asset('images/logo.png') }}" alt="Mexicali Card Shop">
                </a>
                <button @click="isOpen = false" type="button" class="-m-2.5 rounded-md p-2.5 text-gray-700">
                    <span class="sr-only">Close menu</span>
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="mt-6 flow-root">
                <div class="-my-6 divide-y divide-gray-500/10">
                    <div class="space-y-2 py-6">
                    <a href="{{ route('productos.index') }}" class="text-sm font-semibold text-gray-900">Productos</a>
                        
                        
                        
                    </div>
                    <div class="py-6">
                        <a href="{{ route('register') }}" class="text-sm font-semibold text-gray-900">Registrarse</a>
                    </div>

                    <div class="py-6">
                        <a href="{{ route('login') }}" class="text-sm font-semibold text-gray-900">Iniciar Sesión <span aria-hidden="true">&rarr;</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
