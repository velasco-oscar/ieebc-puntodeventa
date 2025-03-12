@props(['producto'])

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800">{{ $producto->nombre }}</h2>
        <p class="mt-2 text-gray-600">{{ $producto->descripcion }}</p>
        <div class="mt-4 flex items-center justify-between">
            <span class="text-lg font-bold text-indigo-600">${{ number_format($producto->precio, 2) }}</span>
            <span class="text-sm text-gray-500">Stock: {{ $producto->stock }}</span>
        </div>
    </div>
</div>
