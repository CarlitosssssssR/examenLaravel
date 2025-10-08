@extends('layouts.app')

@section('content')
<h1>Ver cliente</h1>
<ul>
  <li>Cédula: {{ $cliente->cedula }}</li>
  <li>Nombre: {{ $cliente->nombre }}</li>
  <li>Apellido: {{ $cliente->apellido }}</li>
</ul>
<a href="{{ route('clientes.index') }}">Volver</a>
@endsection