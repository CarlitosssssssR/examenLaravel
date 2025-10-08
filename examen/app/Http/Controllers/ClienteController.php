<?php
namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::orderBy('id','desc')->paginate(10);
        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        return view('clientes.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'cedula' => 'required|string|unique:clientes,cedula',
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
        ]);

        Cliente::create($data);

        return redirect()->route('clientes.index')->with('success','Cliente creado correctamente.');
    }

    public function show(Cliente $cliente)
    {
        return view('clientes.show', compact('cliente'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit', compact('cliente'));
    }

    public function update(Request $request, Cliente $cliente)
    {
        $data = $request->validate([
            'cedula' => 'required|string|unique:clientes,cedula,'.$cliente->id,
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255'
        ]);

        $cliente->update($data);

        return redirect()->route('clientes.index')->with('success','Cliente actualizado.');
    }

    public function destroy(Cliente $cliente)
    {
        $cliente->delete();
        return redirect()->route('clientes.index')->with('success','Cliente eliminado.');
    }
}