<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Proveedor extends Model
{
    use SoftDeletes;

    protected $table = 'proveedores';

    protected $fillable = [
        'nombre', 'email', 'telefono', 'direccion',
    ];
    
    public function productos()
{
    return $this->hasMany(Producto::class, 'proveedor_id');
}

}

