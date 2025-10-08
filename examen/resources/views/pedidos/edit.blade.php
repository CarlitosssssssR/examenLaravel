@extends('layouts.app')
@section('content')
<h1>Editar pedido</h1>
<form action="{{ route('pedidos.update', $pedido) }}" method="POST">
  @method('PUT')
  @include('pedidos.form')
</form>
@endsection