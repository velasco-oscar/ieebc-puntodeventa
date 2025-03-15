<x-admin-layout>
    <div class="flex justify-between items-center mb-6">
        <h1 class="text-3xl font-bold text-gray-800">Proveedores</h1>
        <a href="{{ route('admin.proveedores.create') }}"
           class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition-colors">
            Nuevo Proveedor
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
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-800">Email</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-800">Teléfono</th>
                <th class="px-6 py-3 text-left text-sm font-medium text-gray-800">Dirección</th>
                <th class="px-6 py-3 text-center text-sm font-medium text-gray-800">Acciones</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach($providers as $provider)
                <tr>
                    <td class="px-6 py-4">{{ $provider->nombre }}</td>
                    <td class="px-6 py-4">{{ $provider->email }}</td>
                    <td class="px-6 py-4">{{ $provider->telefono }}</td>
                    <td class="px-6 py-4">{{ $provider->direccion }}</td>
                    <td class="px-6 py-4 text-center">
                        <a href="{{ route('admin.proveedores.edit', $provider->id) }}" class="text-indigo-600 hover:underline">
                            Editar
                        </a>
                        <form action="{{ route('admin.proveedores.destroy', $provider->id) }}" method="POST" class="inline-block" onsubmit="return confirm('¿Estás seguro de eliminar este proveedor?');">
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
