@extends('layouts.app')
@section('content')
<h1>Editar cliente</h1>
<form action="{{ route('clientes.update', $cliente) }}" method="POST">
  @method('PUT')
  @include('clientes.form')
</form>
@endsection