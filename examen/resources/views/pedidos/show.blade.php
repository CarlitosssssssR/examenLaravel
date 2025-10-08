@extends('layouts.app')

@section('content')
<h1>Ver pedido</h1>
<ul>
  <li>ID pedido: {{ $pedido->id_pedido }}</li>
  <li>Cliente: {{ $pedido->cliente->nombre ?? $pedido->cedula_cliente }}</li>
  <li>Producto: {{ $pedido->producto->nombre ?? $pedido->codigo_producto }}</li>
  <li>Cantidad: {{ $pedido->cantidad }}</li>
</ul>
<a href="{{ route('pedidos.index') }}">Volver</a>
@endsection