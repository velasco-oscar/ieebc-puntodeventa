<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'proveedor_id'
    ];

    
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }

    public function cliente()
{
    return $this->belongsTo(Cliente::class);
}

}