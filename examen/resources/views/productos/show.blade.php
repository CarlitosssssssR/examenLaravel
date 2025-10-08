@extends('layouts.app')

@section('content')
<h1>Ver producto</h1>
<ul>
  <li>Código: {{ $producto->codigo_producto }}</li>
  <li>Nombre: {{ $producto->nombre }}</li>
  <li>Descripción: {{ $producto->descripcion }}</li>
  <li>Stock: {{ $producto->stock }}</li>
</ul>
<a href="{{ route('productos.index') }}">Volver</a>
@endsection