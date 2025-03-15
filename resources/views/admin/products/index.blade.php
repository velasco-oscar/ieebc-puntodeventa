@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto py-8 px-4">
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-2xl font-bold text-gray-800">Lista de Productos</h1>
        <a href="{{ route('admin.products.create') }}" 
           class="px-4 py-2 bg-indigo-600 text-white rounded-md hover:bg-indigo-700 transition-colors">
            + Nuevo Producto
        </a>
    </div>

    <div class="bg-white rounded-lg shadow overflow-hidden">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nombre</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Precio</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Stock</th>
                    <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase">Acciones</th>
                </tr>
            </thead>
            <tbody class="bg-white divide-y divide-gray-200">
                @foreach($productos as $producto)
                <tr>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $producto->nombre }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">${{ number_format($producto->precio, 2) }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">{{ $producto->stock }}</td>
                    <td class="px-6 py-4 whitespace-nowrap">
                        <a href="{{ route('admin.products.edit', $producto) }}" 
                           class="text-indigo-600 hover:text-indigo-900 mr-4">Editar</a>
                        <form action="{{ route('admin.products.destroy', $producto) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection