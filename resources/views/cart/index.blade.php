<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Tu Carrito</h1>
        @if($cart->items->isEmpty())
            <p class="text-gray-700">No hay productos en tu carrito.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b text-center">Imagen</th>
                        <th class="py-2 px-4 border-b text-center">Producto</th>
                        <th class="py-2 px-4 border-b text-center">Cantidad</th>
                        <th class="py-2 px-4 border-b text-center">Precio</th>
                        <th class="py-2 px-4 border-b text-center">Subtotal</th>
                        <th class="py-2 px-4 border-b text-center">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        <tr>
                            <!-- Imagen -->
                            <td class="py-2 px-4 border-b text-center">
                                @if($item->producto->imagen)
                                    <img src="{{ Str::startsWith($item->producto->imagen, 'http') ? $item->producto->imagen : asset('storage/' . $item->producto->imagen) }}"
                                         alt="{{ $item->producto->nombre }}"
                                         class="h-12 w-12 object-cover mx-auto">
                                @else
                                    <div class="h-12 w-12 bg-gray-200 flex items-center justify-center mx-auto">
                                        <span class="text-gray-500 text-xs">Sin imagen</span>
                                    </div>
                                @endif
                            </td>
                            <!-- Producto -->
                            <td class="py-2 px-4 border-b text-center">{{ $item->producto->nombre }}</td>
                            <!-- Cantidad -->
                            <td class="py-2 px-4 border-b text-center">{{ $item->quantity }}</td>
                            <!-- Precio -->
                            <td class="py-2 px-4 border-b text-center">${{ number_format($item->producto->precio, 2) }}</td>
                            <!-- Subtotal -->
                            <td class="py-2 px-4 border-b text-center">${{ number_format($item->quantity * $item->producto->precio, 2) }}</td>
                            <!-- Acciones -->
                            <td class="py-2 px-4 border-b text-center">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
                 <!-- Botón de Checkout -->
                 <div class="mt-4 flex justify-end">
                <a href="{{ route('checkout.index') }}" class="bg-custom-red text-white px-4 py-2 rounded hover:bg-custom-red-hover">
                    Checkout
                </a>
            </div>
        @endif
    </div>
</x-app-layout>