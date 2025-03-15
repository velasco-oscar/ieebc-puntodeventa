# Punto de Venta – Proyecto IEEBC

Este proyecto es una aplicación de punto de venta desarrollada con Laravel, basada en la prueba de software de IEEBC. La aplicación utiliza Laravel Breeze para la autenticación, componentes Blade reutilizables (x-components) y Livewire para la funcionalidad de la lista de deseos.

## Tabla de Contenidos

- Características
- Tecnologías Utilizadas
- Instalación y Configuración
- Migraciones y Seeders
- Panel Administrativo
- Flujo de Venta
- Capturas de Pantalla


## Características

- Autenticación y Autorización:
  Utiliza Laravel Breeze para registrar, autenticar y gestionar usuarios.

- Gestión de Productos y Proveedores:
  Panel administrativo para crear, editar, listar y eliminar productos y proveedores.

- Carrito de Compras:
  Funcionalidad para agregar productos al carrito, modificar cantidades y eliminar productos.

- Lista de Deseos:
  Implementada con Livewire para que los clientes puedan guardar productos para comprar más adelante y recibir notificaciones si hay stock.

- Flujo de Venta:
  Proceso completo para realizar una venta, registrar cada detalle de la venta y disminuir el stock de los productos vendidos.

## Tecnologías Utilizadas

- Backend: Laravel 11
- Frontend: Blade, Tailwind CSS, x-components de Laravel Breeze
- Interactividad: Livewire (para la lista de deseos)
- Base de Datos: MySQL

## Instalación y Configuración

1. Clonar el Repositorio:
   
   git clone

   cd ieebc-puntodeventa

2. Instalar Dependencias:
   
   composer install
   
   npm install
   
   npm run dev

3. Configurar Variables de Entorno:
   
   Copia el archivo .env.example a .env y configura las variables necesarias (APP_KEY, DB_CONNECTION, DB_DATABASE, DB_USERNAME, DB_PASSWORD, etc.):
   
   cp .env.example .env
   
   php artisan key:generate

4. Migrar la Base de Datos y Ejecutar Seeders:
   
   php artisan migrate:fresh --seed

## Migraciones y Seeders

El proyecto incluye migraciones para:
- Usuarios, Clientes, Proveedores, Productos, Ventas, Detalle de Ventas, Lista de Deseos, Carrito y Artículos del Carrito.

Los seeders incluyen datos de prueba para proveedores, productos y un usuario administrador (con su correspondiente cliente asociado).

## Panel Administrativo

El panel administrativo se implementa con controladores y vistas Blade tradicionales. Se accede mediante rutas protegidas por middleware y se diferencia mediante el rol del usuario (admin).

- En AdminUserSeeder se genera automáticamente un usuario administrador.

## Flujo de Venta

El proceso de venta permite:
- Agregar productos al carrito.
- Realizar la compra, lo que genera un registro en la tabla de ventas y detalles de venta.
- Actualizar el stock de los productos vendidos.
- Registrar y manejar productos y proveedores.


## Capturas de Pantalla

_Agrega aquí capturas de pantalla de la aplicación, por ejemplo:_
- Pantalla de inicio.
  ![landing](https://github.com/user-attachments/assets/49535310-efc2-450a-bc52-4d0741499475)
- Catálogo de productos.
  ![productos](https://github.com/user-attachments/assets/cc8dd5ad-c8ff-49ce-9e78-66256d9b78fa)
- Panel administrativo (listado y formulario de productos/proveedores).
  ![manegarproductos](https://github.com/user-attachments/assets/47753a6b-9c19-4f2b-a9f8-65f33e12983a)
  ![editarproducto](https://github.com/user-attachments/assets/26fab5e7-9294-41d1-9521-67612f587b0c)
  ![proveedores](https://github.com/user-attachments/assets/00eb0ef5-5699-4bd2-a72b-79a2dd645f3f)
- Lista de deseos con notificaciones.
  ![listadeseos](https://github.com/user-attachments/assets/30e5a774-bcc7-4d41-ad8b-c47dec5c29c4)
- Flujo de venta.
  ![carrito](https://github.com/user-attachments/assets/0bd64d3e-8178-420e-aaaa-e4628ef5abae)
  ![precompra](https://github.com/user-attachments/assets/645e5506-7900-4a14-9c03-b4d248d3d09a)
  ![compra](https://github.com/user-attachments/assets/e74bada1-aeab-4def-a322-8275fb3343e2)




