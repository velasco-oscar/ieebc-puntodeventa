<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Proveedor;

class ProveedoresTableSeeder extends Seeder
{
    public function run()
    {
        Proveedor::create([
            'nombre'    => 'Proveedor 1',
            'email'     => 'contacto@proveedor1.com',
            'telefono'  => '555-123456',
            'direccion' => 'Calle Principal 123, Ciudad',
        ]);

        Proveedor::create([
            'nombre'    => 'Proveedor 2',
            'email'     => 'ventas@proveedor2.com',
            'telefono'  => '555-654321',
            'direccion' => 'Avenida Secundaria 456, Ciudad',
        ]);
    }
}
