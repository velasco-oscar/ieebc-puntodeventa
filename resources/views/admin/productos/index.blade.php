<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Productos</h1>
        <a href="{{ route('admin.productos.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
            Nuevo Producto
        </a>
    </div>

    @if(session('success'))
        <div class="mb-4 p-4 bg-green-100 text-green-600 rounded">
            {{ session('success') }}
        </div>
    @endif

    <table class="w-full bg-white shadow rounded-lg overflow-hidden">
        <thead class="bg-gray-200">
            <tr>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-800">Nombre</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-800">Proveedor</th>
                <th class="px-6 py-3 text-right text-sm font-medium text-gray-800">Precio</th>
                <th class="px-6 py-3 text-right text-sm font-medium text-gray-800">Stock</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-800">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($productos as $producto)
                <tr>
                    <td class="px-6 py-4">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4">{{ $producto->proveedor->nombre }}</td>
                    <td class="px-6 py-4 text-right">${{ number_format($producto->precio, 2) }}</td>
                    <td class="px-6 py-4 text-right">{{ $producto->stock }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.productos.edit', $producto->id) }}" class="text-indigo-600 hover:underline">
                            Editar
                        </a>
                        <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" class="inline-block">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:underline ml-2">
                                Eliminar
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</x-admin-layout>
