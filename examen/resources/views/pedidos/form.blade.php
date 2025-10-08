@csrf
<label>ID pedido</label>
<input name="id_pedido" value="{{ old('id_pedido', $pedido->id_pedido ?? '') }}" required>
<label>Cliente</label>
<select name="cedula_cliente" required>
  <option value="">Seleccione...</option>
  @foreach($clientes as $cedula => $label)
    <option value="{{ $cedula }}" {{ (old('cedula_cliente', $pedido->cedula_cliente ?? '') == $cedula) ? 'selected' : '' }}>{{ $label }}</option>
  @endforeach
</select>
<label>Producto</label>
<select name="codigo_producto" required>
  <option value="">Seleccione...</option>
  @foreach($productos as $codigo => $nombre)
    <option value="{{ $codigo }}" {{ (old('codigo_producto', $pedido->codigo_producto ?? '') == $codigo) ? 'selected' : '' }}>{{ $nombre }}</option>
  @endforeach
</select>
<label>Cantidad</label>
<input type="number" name="cantidad" value="{{ old('cantidad', $pedido->cantidad ?? 1) }}" min="1">
<button type="submit">Guardar</button>