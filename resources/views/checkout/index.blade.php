<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Resumen de Compra</h1>
        <div class="bg-white shadow-md rounded-lg p-6">
            <h2 class="text-xl font-semibold mb-4">Productos en tu carrito:</h2>
            <ul>
                @foreach($cart->items as $item)
                    <li class="mb-2 flex justify-between">
                        <span>{{ $item->producto->nombre }} (x{{ $item->quantity }})</span>
                        <span>${{ number_format($item->quantity * $item->producto->precio, 2) }}</span>
                    </li>
                @endforeach
            </ul>
            <div class="mt-4 font-bold text-lg">
                Total: ${{ number_format($cart->items->sum(fn($item) => $item->quantity * $item->producto->precio), 2) }}
            </div>
        </div>
        <form action="{{ route('checkout.store') }}" method="POST" class="mt-6">
            @csrf
            <button type="submit" class="bg-green-600 text-white px-6 py-3 rounded hover:bg-green-500">
                Confirmar compra
            </button>
        </form>
    </div>
</x-app-layout>
