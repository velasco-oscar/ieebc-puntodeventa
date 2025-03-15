<x-admin-layout>
    <div class="max-w-3xl mx-auto bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800 mb-4">Editar Producto</h1>
        
        <form action="{{ route('admin.productos.update', $producto->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <!-- Nombre -->
            <div class="mb-4">
                <label for="nombre" class="block text-gray-700 font-medium mb-2">Nombre</label>
                <input type="text" name="nombre" id="nombre" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('nombre', $producto->nombre) }}" required>
                @error('nombre')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Descripción -->
            <div class="mb-4">
                <label for="descripcion" class="block text-gray-700 font-medium mb-2">Descripción</label>
                <textarea name="descripcion" id="descripcion" rows="3"
                          class="w-full border border-gray-300 rounded p-2">{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Precio y Stock -->
            <div class="mb-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label for="precio" class="block text-gray-700 font-medium mb-2">Precio</label>
                    <input type="number" step="0.01" name="precio" id="precio" 
                           class="w-full border border-gray-300 rounded p-2" 
                           value="{{ old('precio', $producto->precio) }}" required>
                    @error('precio')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                <div>
                    <label for="stock" class="block text-gray-700 font-medium mb-2">Stock</label>
                    <input type="number" name="stock" id="stock" 
                           class="w-full border border-gray-300 rounded p-2" 
                           value="{{ old('stock', $producto->stock) }}" required>
                    @error('stock')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>
            
            <!-- Proveedor -->
            <div class="mb-4">
                <label for="proveedor_id" class="block text-gray-700 font-medium mb-2">Proveedor</label>
                <select name="proveedor_id" id="proveedor_id" class="w-full border border-gray-300 rounded p-2" required>
                    <option value="">Seleccione un proveedor</option>
                    @foreach($proveedores as $proveedor)
                        <option value="{{ $proveedor->id }}" {{ old('proveedor_id', $producto->proveedor_id) == $proveedor->id ? 'selected' : '' }}>
                            {{ $proveedor->nombre }}
                        </option>
                    @endforeach
                </select>
                @error('proveedor_id')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- URL de la Imagen -->
            <div class="mb-4">
                <label for="imagen" class="block text-gray-700 font-medium mb-2">URL de la Imagen</label>
                <input type="url" name="imagen" id="imagen" 
                       class="w-full border border-gray-300 rounded p-2" 
                       value="{{ old('imagen', $producto->imagen) }}">
                @error('imagen')
                    <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
            
            <!-- Botón de envío -->
            <div class="flex justify-end">
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded hover:bg-indigo-700 transition">
                    Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</x-admin-layout>
