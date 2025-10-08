<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
            // creame id de pedido
            $table->string('id_pedido')->unique();
            // creame clave foranea a la cedula del cliente (cedula es string en clientes)
            $table->string('cedula_cliente');
            $table->foreign('cedula_cliente')->references('cedula')->on('clientes')->onDelete('cascade');
            // creame clave foranea al codigo del producto (codigo_producto es string en productos)
            $table->string('codigo_producto');
            $table->foreign('codigo_producto')->references('codigo_producto')->on('productos')->onDelete('cascade');
            // creame cantidad
            $table->integer('cantidad')->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
