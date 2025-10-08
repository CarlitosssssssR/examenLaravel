@extends('layouts.app')

@section('content')
<a href="{{ route('pedidos.create') }}">Crear pedido</a>

@if(session('success')) <div>{{ session('success') }}</div> @endif

<table>
  <thead>
    <tr><th>ID pedido</th><th>Cliente</th><th>Producto</th><th>Cantidad</th><th>Acciones</th></tr>
  </thead>
  <tbody>
    @forelse($pedidos ?? [] as $p)
    <tr>
      <td>{{ $p->id_pedido }}</td>
      <td>{{ $p->cliente->nombre ?? $p->cedula_cliente }}</td>
      <td>{{ $p->producto->nombre ?? $p->codigo_producto }}</td>
      <td>{{ $p->cantidad }}</td>
      <td>
        <a href="{{ route('pedidos.show', $p) }}">Ver</a>
        <a href="{{ route('pedidos.edit', $p) }}">Editar</a>
        <form action="{{ route('pedidos.destroy', $p) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Eliminar?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="5">No hay pedidos.</td></tr>
    @endforelse
  </tbody>
</table>

@if(isset($pedidos) && method_exists($pedidos, 'links'))
  {{ $pedidos->links() }}
@endif
@endsection