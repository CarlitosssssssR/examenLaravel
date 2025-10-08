<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;
    protected $fillable = ['cedula', 'nombre', 'apellido'];
    public function pedidos() {
        return $this->hasMany(Pedidos::class, 'cedula_cliente', 'cedula');
    }
}
