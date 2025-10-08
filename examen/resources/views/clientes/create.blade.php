@extends('layouts.app')
@section('content')
<h1>Crear cliente</h1>
<form action="{{ route('clientes.store') }}" method="POST">
  @include('clientes.form')
</form>
@endsection