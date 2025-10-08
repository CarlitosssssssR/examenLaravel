@csrf
<label>Código</label>
<input name="codigo_producto" value="{{ old('codigo_producto', $producto->codigo_producto ?? '') }}" required>
<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $producto->nombre ?? '') }}" required>
<label>Descripción</label>
<input name="descripcion" value="{{ old('descripcion', $producto->descripcion ?? '') }}">
<label>Stock</label>
<input type="number" name="stock" value="{{ old('stock', $producto->stock ?? 0) }}" min="0">
<button type="submit">Guardar</button>