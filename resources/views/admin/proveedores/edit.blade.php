{{-- resources/views/admin/proveedores/edit.blade.php --}}
<x-admin-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Editar Proveedor</h1>
        
        <form action="{{ route('admin.proveedores.update', $proveedor) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('nombre', $proveedor->nombre) }}" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('email', $proveedor->email) }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
                <input type="text" name="telefono" id="telefono" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('telefono', $proveedor->telefono) }}">
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
                <input type="text" name="direccion" id="direccion" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('direccion', $proveedor->direccion) }}">
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botones -->
            <div class="flex justify-end gap-4">
                <a href="{{ route('admin.proveedores.index') }}" 
                   class="bg-gray-300 text-gray-700 px-4 py-2 rounded hover:bg-gray-400 transition">
                    Cancelar
                </a>
                <button type="submit" 
                        class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Actualizar Proveedor
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>