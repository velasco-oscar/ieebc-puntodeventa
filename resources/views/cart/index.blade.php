<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Tu Carrito</h1>
        @if($cart->items->isEmpty())
            <p class="text-gray-700">No hay productos en tu carrito.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 border-b">Producto</th>
                        <th class="py-2 px-4 border-b">Cantidad</th>
                        <th class="py-2 px-4 border-b">Precio</th>
                        <th class="py-2 px-4 border-b">Subtotal</th>
                        <th class="py-2 px-4 border-b">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($cart->items as $item)
                        <tr>
                            <td class="py-2 px-4 border-b">{{ $item->producto->nombre }}</td>
                            <td class="py-2 px-4 border-b">{{ $item->quantity }}</td>
                            <td class="py-2 px-4 border-b">${{ number_format($item->producto->precio, 2) }}</td>
                            <td class="py-2 px-4 border-b">
                                ${{ number_format($item->quantity * $item->producto->precio, 2) }}
                            </td>
                            <td class="py-2 px-4 border-b">
                                <form action="{{ route('cart.remove', $item->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</x-app-layout>
