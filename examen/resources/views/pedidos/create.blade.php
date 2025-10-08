@extends('layouts.app')
@section('content')
<h1>Crear pedido</h1>
<form action="{{ route('pedidos.store') }}" method="POST">
  @include('pedidos.form')
</form>
@endsection