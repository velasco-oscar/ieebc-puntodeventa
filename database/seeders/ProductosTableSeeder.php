<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductosTableSeeder extends Seeder
{
    public function run()
    {
        Producto::create([
            'nombre' => 'Crown Zenith booster',
            'descripcion' => '1 sobre de 10 cartas',
            'precio' => 100.00,
            'stock' => 13,
            'proveedor_id' => 1,
            'imagen' => 'https://i.ebayimg.com/images/g/Y-IAAOSwMSljxzGG/s-l1200.png',
        ]);

        Producto::create([
            'nombre' => 'Journey Together Booster Bundle',
            'descripcion' => 'Caja con 6 sobres',
            'precio' => 400.00,
            'stock' => 50,
            'proveedor_id' => 1,
            'imagen' => 'https://m.media-amazon.com/images/I/81rWT3qf9FL.jpg',
        ]);
    }
}
