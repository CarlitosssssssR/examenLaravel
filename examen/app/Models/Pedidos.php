<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedidos extends Model
{
    use HasFactory;

    protected $fillable = ['id_pedido', 'cedula_cliente', 'codigo_producto', 'cantidad'];

    public function cliente() {
        return $this->belongsTo(Cliente::class, 'cedula_cliente', 'cedula');
    }

    public function producto() {
        return $this->belongsTo(Productos::class, 'codigo_producto', 'codigo_producto');
    }
}
