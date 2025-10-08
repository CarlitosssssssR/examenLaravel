@extends('layouts.app')

@section('content')
<a href="{{ route('productos.create') }}">Crear producto</a>

@if(session('success')) <div>{{ session('success') }}</div> @endif

<table>
  <thead>
    <tr><th>Código</th><th>Nombre</th><th>Stock</th><th>Acciones</th></tr>
  </thead>
  <tbody>
    @forelse($productos ?? [] as $p)
    <tr>
      <td>{{ $p->codigo_producto }}</td>
      <td>{{ $p->nombre }}</td>
      <td>{{ $p->stock }}</td>
      <td>
        <a href="{{ route('productos.show', $p) }}">Ver</a>
        <a href="{{ route('productos.edit', $p) }}">Editar</a>
        <form action="{{ route('productos.destroy', $p) }}" method="POST" style="display:inline">
          @csrf @method('DELETE')
          <button type="submit" onclick="return confirm('Eliminar?')">Eliminar</button>
        </form>
      </td>
    </tr>
    @empty
    <tr><td colspan="4">No hay productos.</td></tr>
    @endforelse
  </tbody>
</table>

@if(isset($productos) && method_exists($productos, 'links'))
  {{ $productos->links() }}
@endif
@endsection