@extends('layouts.app')

@section('content')
<a href="{{ route('clientes.create') }}">Crear cliente</a>

@if(session('success')) <div>{{ session('success') }}</div> @endif

<table>
  <thead>
    <tr><th>Cédula</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr>
  </thead>
  <tbody>
    @forelse($clientes ?? [] as $c)
    <tr>
      <td>{{ $c->cedula }}</td>
      <td>{{ $c->nombre }}</td>
      <td>{{ $c->apellido }}</td>
      <td>
        <a href="{{ route('clientes.show', $c) }}">Ver</a>
        <a href="{{ route('clientes.edit', $c) }}">Editar</a>
        <form action="{{ route('clientes.destroy', $c) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Eliminar?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @empty
    <tr>
      <td colspan="4">No hay clientes aún.</td>
    </tr>
    @endforelse
  </tbody>
</table>

@if(isset($clientes) && method_exists($clientes, 'links'))
  {{ $clientes->links() }}
@endif
@endsection