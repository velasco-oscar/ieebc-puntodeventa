@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Agregar Nuevo Producto</h1>
    
    <form action="{{ route('admin.products.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <x-input-label for="nombre" :value="__('Nombre del Producto')" />
            <x-text-input id="nombre" name="nombre" type="text" 
                        class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>

        <div>
            <x-input-label for="descripcion" :value="__('Descripción')" />
            <textarea id="descripcion" name="descripcion" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    rows="4"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('descripcion')" />
        </div>

        <div>
            <x-input-label for="precio" :value="__('Precio')" />
            <x-text-input id="precio" name="precio" type="number" step="0.01" 
                        class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('precio')" />
        </div>

        <div>
            <x-input-label for="stock" :value="__('Stock')" />
            <x-text-input id="stock" name="stock" type="number" 
                        class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('stock')" />
        </div>

        <div class="flex justify-end">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                {{ __('Guardar Producto') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection