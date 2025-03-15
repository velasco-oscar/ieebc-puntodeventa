{{-- resources/views/admin/proveedores/create.blade.php --}}
<x-admin-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Nuevo Proveedor</h1>
        
        <form action="{{ route('admin.proveedores.store') }}" method="POST">
            @csrf
            
            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('nombre') }}" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-medium mb-2">Email</label>
                <input type="email" name="email" id="email" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('email') }}" required>
                @error('email')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Teléfono -->
            <div class="mb-4">
                <label for="telefono" class="block text-gray-700 font-medium mb-2">Teléfono</label>
                <input type="text" name="telefono" id="telefono" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('telefono') }}">
                @error('telefono')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Dirección -->
            <div class="mb-4">
                <label for="direccion" class="block text-gray-700 font-medium mb-2">Dirección</label>
                <input type="text" name="direccion" id="direccion" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('direccion') }}">
                @error('direccion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <!-- Botón de envío -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Guardar Proveedor
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>