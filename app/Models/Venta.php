<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    // Define los campos que se pueden asignar de forma masiva
    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'total',
        'fecha',
    ];

    // Relación: Una venta tiene muchos detalles (líneas de venta)
    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    // Relación: Una venta pertenece a un cliente (opcional)
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    // Relación: Una venta pertenece a un usuario (quien procesa la venta)
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }
}
