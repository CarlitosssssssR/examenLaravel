@extends('layouts.app')
@section('content')
<h1>Editar producto</h1>
<form action="{{ route('productos.update', $producto) }}" method="POST">
  @method('PUT')
  @include('productos.form')
</form>
@endsection