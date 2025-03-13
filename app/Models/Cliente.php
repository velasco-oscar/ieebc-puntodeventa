<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Cliente extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'user_id',
        'nombre',
        'email',
        'telefono',
        'direccion',
    ];

    // Relación: un cliente pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
