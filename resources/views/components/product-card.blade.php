@props(['producto'])

<div class="bg-white shadow-md rounded-lg overflow-hidden relative" x-data="{ showToast: false }">
    {{-- Image Container --}}
    <div class="relative h-48"> <!-- Added fixed height container -->
        @if(Str::startsWith($producto->imagen, ['http://', 'https://']))
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-full h-full object-cover">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500">Sin imagen</span>
            </div>
        @endif

        {{-- Wishlist Button --}}
        <form 
            action="{{ route('wishlist.add', $producto) }}" 
            method="POST"
            class="absolute top-2 right-2"
        >
            @csrf
            <button 
                type="submit" 
                class="bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors focus:outline-none"
                title="Agregar a Lista de Deseos"
            >
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    {{-- Product Details --}}
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $producto->nombre }}</h2>
        <p class="mt-2 text-gray-600 line-clamp-2">{{ $producto->descripcion }}</p>
        
        <div class="mt-4 flex items-center justify-between">
            <span class="text-lg font-bold text-custom-red">
                ${{ number_format($producto->precio, 2) }}
            </span>
            <span class="text-sm text-gray-500">
                Stock: {{ $producto->stock }}
            </span>
        </div>
        
        {{-- Add to Cart Form --}}
        <form method="POST" action="{{ route('cart.add', $producto->id) }}" class="mt-4"
              @submit.prevent="showToast = true; setTimeout(() => showToast = false, 3000); $event.target.submit();">
            @csrf
            <div class="flex items-center gap-2">
                <input type="number" name="quantity" min="1" value="1" 
                       class="w-16 px-2 py-1 border rounded-md focus:ring-2 focus:ring-custom-red">
                <button type="submit" 
                        class="bg-custom-red text-white px-4 py-2 rounded-md hover:bg-custom-red-hover transition-colors flex-1">
                    Agregar al carrito
                </button>
            </div>
        </form>
    </div>

    {{-- Toast Notifications --}}
    <div x-show="showToast" 
         x-transition:enter="transition ease-out duration-300"
         x-transition:enter-start="opacity-0 translate-y-4"
         x-transition:enter-end="opacity-100 translate-y-0"
         x-transition:leave="transition ease-in duration-300"
         x-transition:leave-start="opacity-100 translate-y-0"
         x-transition:leave-end="opacity-0 translate-y-4"
         class="fixed bottom-4 right-4 bg-green-500 text-white px-4 py-2 rounded-lg shadow-lg">
        Producto agregado al carrito 
    </div>
</div>