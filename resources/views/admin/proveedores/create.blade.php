@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto py-8 px-4">
    <h1 class="text-2xl font-bold text-gray-800 mb-6">Agregar Nuevo Proveedor</h1>
    
    <form action="{{ route('admin.providers.store') }}" method="POST" class="space-y-6">
        @csrf
        
        <div>
            <x-input-label for="nombre" :value="__('Nombre del Proveedor')" />
            <x-text-input id="nombre" name="nombre" type="text" 
                        class="mt-1 block w-full" required autofocus />
            <x-input-error class="mt-2" :messages="$errors->get('nombre')" />
        </div>

        <div>
            <x-input-label for="contacto" :value="__('Persona de Contacto')" />
            <x-text-input id="contacto" name="contacto" type="text" 
                        class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('contacto')" />
        </div>

        <div>
            <x-input-label for="telefono" :value="__('Teléfono')" />
            <x-text-input id="telefono" name="telefono" type="tel" 
                        class="mt-1 block w-full" required />
            <x-input-error class="mt-2" :messages="$errors->get('telefono')" />
        </div>

        <div>
            <x-input-label for="direccion" :value="__('Dirección')" />
            <textarea id="direccion" name="direccion" 
                    class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    rows="3"></textarea>
            <x-input-error class="mt-2" :messages="$errors->get('direccion')" />
        </div>

        <div class="flex justify-end">
            <x-primary-button class="bg-indigo-600 hover:bg-indigo-700">
                {{ __('Guardar Proveedor') }}
            </x-primary-button>
        </div>
    </form>
</div>
@endsection