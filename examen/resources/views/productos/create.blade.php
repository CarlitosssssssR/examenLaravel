@extends('layouts.app')
@section('content')
<h1>Crear producto</h1>
<form action="{{ route('productos.store') }}" method="POST">
  @include('productos.form')
</form>
@endsection