<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            ProveedoresTableSeeder::class,
            ProductosTableSeeder::class,
            AdminUserSeeder::class,
        ]);
    }
}
