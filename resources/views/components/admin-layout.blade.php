<!-- resources/views/components/admin-layout.blade.php -->
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Administrativo - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    {{-- Incluimos la navegación general --}}
    @include('layouts.navigation')
    
    <div class="flex min-h-screen">
        <!-- Sidebar Administrativo -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
                    Panel Administrativo
                </a>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.productos.index') }}" class="block py-2.5 px-4 hover:bg-gray-200 transition-colors">
                    Productos
                </a>
                <a href="{{ route('admin.proveedores.index') }}" class="block py-2.5 px-4 hover:bg-gray-200 transition-colors">
                    Proveedores
                </a>
            </nav>
        </aside>
        <!-- Contenido Principal -->
        <div class="flex-grow p-6">
            {{ $slot }}
        </div>
    </div>
</body>
</html>
