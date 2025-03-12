<x-app-layout>
    <div class="container mx-auto py-8">
        <h1 class="text-3xl font-bold mb-6">Catálogo de Productos</h1>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-6">
            @foreach($productos as $producto)
                <x-product-card :producto="$producto" />
            @endforeach
        </div>
    </div>
</x-app-layout>
