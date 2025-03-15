<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use SoftDeletes;

    // Required for mass assignment
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'stock',
        'proveedor_id'
    ];

    // Add relationship to Proveedor if needed
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}