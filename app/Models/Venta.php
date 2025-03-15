<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'cliente_id',
        'usuario_id',
        'total',
        'fecha'
    ];

    
    public function detalleVentas()
    {
        return $this->hasMany(DetalleVenta::class);
    }

    
    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    
    public function user()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function venta()
{
    return $this->belongsTo(Venta::class);
}

}
