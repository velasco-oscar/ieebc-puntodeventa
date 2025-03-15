<div class="container mx-auto py-8 px-4">
    <h1 class="text-3xl font-bold mb-8 text-gray-800 text-center">
        Mi Lista de Deseos
    </h1>

    @if(session()->has('message'))
        <div class="mb-6 px-4 py-3 rounded-lg bg-green-100 text-green-600 flex justify-between items-center transition-all duration-300"
             x-data="{ show: true }"
             x-show="show"
             x-init="setTimeout(() => show = false, 3000)">
            <span>{{ session('message') }}</span>
            <button @click="show = false" class="ml-4 text-green-700 hover:text-green-900">
                ✕
            </button>
        </div>
    @endif

    @if($wishlistItems->isEmpty())
        <div class="text-center py-12">
            <p class="text-gray-700 text-lg">No tienes productos en tu lista de deseos.</p>
        </div>
    @else
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($wishlistItems as $item)
                <div x-data="{ 
                        show: true, 
                        hasStock: @js($item->producto->stock > 0),
                        isAdding: false
                     }"
                     x-show="show"
                     x-transition:leave="transition ease-in duration-200"
                     x-transition:leave-start="opacity-100"
                     x-transition:leave-end="opacity-0"
                     class="bg-white rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300 relative">
                    
                    <!-- Imagen -->
                    <div class="relative h-32 overflow-hidden">
                        @if($item->producto && $item->producto->imagen)
                            <img src="{{ Str::startsWith($item->producto->imagen, 'http') ? $item->producto->imagen : asset('storage/' . $item->producto->imagen) }}"
                                 alt="{{ $item->producto->nombre }}"
                                 class="w-full h-full object-cover transform hover:scale-105 transition-transform duration-300">
                        @else
                            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                                <span class="text-gray-500">Sin imagen</span>
                            </div>
                        @endif
                    </div>

                    <!-- Contenido de la tarjeta -->
                    <div class="p-4">
                        <h2 class="text-xl font-semibold text-gray-800 truncate">
                            {{ $item->producto->nombre }}
                        </h2>
                        <p class="mt-2 text-gray-600 text-sm">
                            {{ $item->producto->descripcion }}
                        </p>
                        
                        <div class="mt-4 flex items-center justify-between">
                            <span class="text-lg font-bold text-custom-red">
                                ${{ number_format($item->producto->precio, 2) }}
                            </span>
                            <span class="text-sm text-gray-500">
                                Stock: {{ $item->producto->stock }}
                            </span>
                        </div>

                        <!-- Botones de acción -->
                        <div class="mt-4 flex space-x-2">
                            <!-- Botón de añadir al carrito -->
                            <button wire:click="addToCart({{ $item->producto->id }})"
                                    x-on:click="isAdding = true"
                                    :disabled="!hasStock || isAdding"
                                    class="px-3 py-1 rounded-md transition-colors flex items-center"
                                    :class="{
                                        'bg-gray-200 text-gray-700 hover:bg-gray-300': hasStock,
                                        'bg-gray-100 text-gray-400 cursor-not-allowed': !hasStock
                                    }"
                                    title="{{ $item->producto->stock > 0 ? 'Añadir al carrito' : 'Sin stock' }}">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                                </svg>
                                <template x-if="!isAdding">
                                    <span x-text="hasStock ? 'Añadir' : 'Sin stock'"></span>
                                </template>
                            </button>
                            
                            <!-- Botón de eliminar -->
                            <button wire:click="removeItem({{ $item->id }})" 
                                    class="bg-red-600 text-white px-3 py-1 rounded-md hover:bg-red-700 transition-colors flex items-center"
                                    title="Eliminar">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"/>
                                </svg>
                                Remover
                            </button>
                        </div>
                    </div>

                    <!-- Loading overlay -->
                    <div wire:loading wire:target="removeItem, addToCart"
                         class="absolute inset-0 bg-white bg-opacity-80 flex items-center justify-center rounded-lg">
                        <svg class="animate-spin h-6 w-6 text-custom-red" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4" fill="none"/>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"/>
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
</div>