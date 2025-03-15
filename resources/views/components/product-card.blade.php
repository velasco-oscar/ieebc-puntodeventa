@props(['producto', 'inCart' => false])

<div class="bg-white shadow-md rounded-lg overflow-hidden relative" 
     x-data="{ 
         showCartToast: false,
         showErrorToast: false,
         inCart: @js($inCart),
         isSubmitting: false,
         currentStock: @js($producto->stock),
         quantity: 1
     }"
     x-cloak>
    <!-- Image Section -->
    <div class="relative h-48">
        @if(Str::startsWith($producto->imagen, ['http://', 'https://']))
            <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" 
                 class="w-full h-full object-cover hover:opacity-90 transition-opacity">
        @else
            <div class="w-full h-full bg-gray-200 flex items-center justify-center">
                <span class="text-gray-500">Sin imagen</span>
            </div>
        @endif

        <!-- Wishlist Button -->
        <form action="{{ route('wishlist.add', $producto) }}" method="POST"
              class="absolute top-2 right-2"
              x-data="{ isWishlistSubmitting: false }"
              @submit.prevent="
                  isWishlistSubmitting = true;
                  fetch($event.target.action, {
                      method: 'POST',
                      body: new FormData($event.target),
                      headers: {
                          'Accept': 'application/json',
                          'X-Requested-With': 'XMLHttpRequest'
                      }
                  })
                  .then(response => {
                      if (!response.ok) throw new Error(response.statusText);
                      return response.json();
                  })
                  .then(data => {
                      $dispatch('notify', { message: data.message, type: 'success' });
                  })
                  .catch(error => {
                      $dispatch('notify', { message: 'Error al agregar a lista de deseos', type: 'error' });
                  })
                  .finally(() => isWishlistSubmitting = false);
              ">
            @csrf
            <button type="submit" 
                    class="bg-white rounded-full p-2 shadow-md hover:bg-gray-100 transition-colors focus:outline-none"
                    :disabled="isWishlistSubmitting"
                    title="Agregar a Lista de Deseos">
                <svg class="h-5 w-5" :class="isWishlistSubmitting ? 'text-gray-400' : 'text-red-500'" 
                     fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd" d="M3.172 5.172a4 4 0 015.656 0L10 6.343l1.172-1.171a4 4 0 115.656 5.656L10 18.343l-6.828-6.829a4 4 0 010-5.656z" clip-rule="evenodd" />
                </svg>
            </button>
        </form>
    </div>

    <!-- Product Details -->
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $producto->nombre }}</h2>
        <p class="mt-2 text-gray-600 line-clamp-2">{{ $producto->descripcion }}</p>
        
        <div class="mt-4 flex items-center justify-between">
            <span class="text-lg font-bold text-custom-red">
                ${{ number_format($producto->precio, 2) }}
            </span>
            <span class="text-sm text-gray-500">
                Stock: <span x-text="currentStock"></span>
            </span>
        </div>
        
        <!-- Add to Cart Form -->
        <form method="POST" action="{{ route('cart.add', $producto) }}" 
              class="mt-4"
              x-ref="cartForm"
              @submit.prevent="
                  isSubmitting = true;
                  if (quantity > currentStock) {
                      $dispatch('notify', { 
                          message: `Solo quedan ${currentStock} unidades en stock`, 
                          type: 'error' 
                      });
                      isSubmitting = false;
                      return;
                  }
                  
                  fetch($refs.cartForm.action, {
                      method: 'POST',
                      body: new FormData($refs.cartForm),
                      headers: {
                          'Accept': 'application/json',
                          'X-Requested-With': 'XMLHttpRequest'
                      }
                  })
                  .then(response => {
                      if (!response.ok) throw new Error(response.statusText);
                      return response.json();
                  })
                  .then(data => {
                      if (data.success) {
                          inCart = true;
                          currentStock -= quantity;
                          $dispatch('notify', { 
                              message: data.message, 
                              type: 'success' 
                          });
                      } else {
                          $dispatch('notify', { 
                              message: data.message, 
                              type: 'error' 
                          });
                      }
                  })
                  .catch(error => {
                      $dispatch('notify', { 
                          message: 'Error al agregar al carrito', 
                          type: 'error' 
                      });
                  })
                  .finally(() => isSubmitting = false);
              ">
            @csrf
            <div class="flex items-center gap-2">
                <input type="number" 
                       name="quantity" 
                       min="1" 
                       :max="currentStock"
                       x-model="quantity"
                       class="w-16 px-2 py-1 border rounded-md focus:ring-2 focus:ring-custom-red"
                       x-bind:disabled="inCart || isSubmitting || currentStock === 0">
                
                <button type="submit" 
                        class="w-full text-white px-4 py-2 rounded-md transition-colors flex items-center justify-center gap-2"
                        :class="{ 
                            'bg-gray-400 cursor-not-allowed': inCart || isSubmitting || currentStock === 0, 
                            'bg-custom-red hover:bg-custom-red-hover': !inCart && !isSubmitting && currentStock > 0 
                        }"
                        x-bind:disabled="inCart || isSubmitting || currentStock === 0">
                    <template x-if="!isSubmitting">
                        <span class="flex items-center gap-2">
                            <template x-if="inCart">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                            </template>
                            <template x-if="currentStock > 0">
                                <span x-text="inCart ? 'En el carrito' : 'Agregar al carrito'"></span>
                            </template>
                            <template x-if="currentStock === 0">
                                <span>Sin stock</span>
                            </template>
                        </span>
                    </template>
                    <template x-if="isSubmitting">
                        <span class="flex items-center gap-2">
                            <svg class="animate-spin h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Procesando...
                        </span>
                    </template>
                </button>
            </div>
        </form>
    </div>

    <!-- Global Notification Container -->
    <div class="fixed bottom-4 right-4 space-y-2" style="z-index: 9999;">
        <template x-for="notification in $store.notifications.items" :key="notification.id">
            <div x-show="notification.visible"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="transform opacity-0 translate-y-4"
                 x-transition:enter-end="transform opacity-100 translate-y-0"
                 x-transition:leave="transition ease-in duration-300"
                 x-transition:leave-start="transform opacity-100 translate-y-0"
                 x-transition:leave-end="transform opacity-0 translate-y-4"
                 class="px-4 py-2 rounded-lg shadow-lg text-sm"
                 :class="{
                     'bg-green-500 text-white': notification.type === 'success',
                     'bg-red-500 text-white': notification.type === 'error'
                 }"
                 @click="notification.visible = false"
                 style="cursor: pointer;">
                <span x-text="notification.message"></span>
            </div>
        </template>
    </div>
</div>