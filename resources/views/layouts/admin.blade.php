<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Panel Administrativo - {{ config('app.name', 'Laravel') }}</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">
        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md">
            <div class="p-6">
                <a href="{{ route('dashboard') }}" class="text-2xl font-bold text-gray-800">
                    Admin Panel
                </a>
            </div>
            <nav class="mt-6">
                <a href="{{ route('admin.productos.index') }}" class="block py-2.5 px-4 hover:bg-gray-200 transition-colors">
                    Productos
                </a>
                <a href="{{ route('admin.proveedores.index') }}"
   class="text-indigo-700 hover:text-indigo-800 transition-colors duration-200">
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
