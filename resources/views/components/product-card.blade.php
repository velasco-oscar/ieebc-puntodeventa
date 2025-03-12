@props(['producto'])

<div class="bg-white shadow-md rounded-lg overflow-hidden">
    @if(Str::startsWith($producto->imagen, ['http://', 'https://']))
        <!-- Si es una URL externa, úsala directamente -->
        <img src="{{ $producto->imagen }}" alt="{{ $producto->nombre }}" class="w-full h-48 object-cover">
    @else
        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
            <span class="text-gray-500">Sin imagen</span>
        </div>
    @endif
    <div class="p-4">
        <h2 class="text-xl font-semibold text-gray-800">{{ $producto->nombre }}</h2>
        <p class="mt-2 text-gray-600">{{ $producto->descripcion }}</p>
        <div class="mt-4 flex items-center justify-between">
            <span class="text-lg font-bold text-indigo-600">${{ number_format($producto->precio, 2) }}</span>
            <span class="text-sm text-gray-500">Stock: {{ $producto->stock }}</span>
        </div>
    </div>
</div>
