<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    use HasFactory;
    protected $fillable = ['codigo_producto', 'nombre', 'descripcion', 'stock'];
    public function pedidos() {
        return $this->hasMany(Pedidos::class, 'codigo_producto', 'codigo_producto');
    }
}
