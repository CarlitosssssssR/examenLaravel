@csrf
<label>Cédula</label>
<input name="cedula" value="{{ old('cedula', $cliente->cedula ?? '') }}" required>
<label>Nombre</label>
<input name="nombre" value="{{ old('nombre', $cliente->nombre ?? '') }}" required>
<label>Apellido</label>
<input name="apellido" value="{{ old('apellido', $cliente->apellido ?? '') }}">
<button type="submit">Guardar</button>