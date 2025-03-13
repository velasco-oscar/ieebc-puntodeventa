<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Mis Órdenes de Compra</h1>
        
        @if($ventas->isEmpty())
            <p class="text-gray-700">No has realizado ninguna compra.</p>
        @else
            @foreach($ventas as $venta)
                <div class="bg-white rounded-lg shadow p-6 mb-4">
                    <div class="flex justify-between items-center mb-4">
                        <span class="font-bold">Orden #{{ $venta->id }}</span>
                        <span class="text-gray-600">{{ \Carbon\Carbon::parse($venta->fecha)->format('d M Y') }}</span>
                    </div>
                    <div class="mb-4">
                        <span class="text-gray-600">Total: </span>
                        <span class="font-bold text-green-700">${{ number_format($venta->total, 2) }}</span>
                    </div>
                    <div>
                        <h2 class="text-lg font-semibold mb-2">Detalle:</h2>
                        <ul class="list-disc pl-4">
                            @foreach($venta->detalleVentas as $detalle)
                                <li>
                                    {{ $detalle->producto->nombre }} - Cantidad: {{ $detalle->cantidad }} - Subtotal: ${{ number_format($detalle->subtotal, 2) }}
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
</x-app-layout>
