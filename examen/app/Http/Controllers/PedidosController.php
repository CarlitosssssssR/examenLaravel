<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Models\Cliente;
use App\Models\Productos;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pedidos = Pedidos::with(['cliente','producto'])->orderBy('id','desc')->paginate(10);
        return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // preparar listas para selects: key => cedula / codigo
        $clientes = Cliente::all()->mapWithKeys(function($c){ return [$c->cedula => $c->nombre . ' ' . $c->apellido]; });
        $productos = Productos::pluck('nombre','codigo_producto');
        return view('pedidos.create', compact('clientes','productos'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'id_pedido' => 'required|string|unique:pedidos,id_pedido',
            'cedula_cliente' => 'required|string|exists:clientes,cedula',
            'codigo_producto' => 'required|string|exists:productos,codigo_producto',
            'cantidad' => 'required|integer|min:1',
        ]);

        Pedidos::create($data);

        return redirect()->route('pedidos.index')->with('success','Pedido creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedido)
    {
        return view('pedidos.show', ['pedido' => $pedido]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedido)
    {
        $clientes = Cliente::all()->mapWithKeys(function($c){ return [$c->cedula => $c->nombre . ' ' . $c->apellido]; });
        $productos = Productos::pluck('nombre','codigo_producto');
        return view('pedidos.edit', ['pedido' => $pedido, 'clientes' => $clientes, 'productos' => $productos]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pedidos $pedido)
    {
        $data = $request->validate([
            'id_pedido' => 'required|string|unique:pedidos,id_pedido,'.$pedido->id,
            'cedula_cliente' => 'required|string|exists:clientes,cedula',
            'codigo_producto' => 'required|string|exists:productos,codigo_producto',
            'cantidad' => 'required|integer|min:1',
        ]);

        $pedido->update($data);

        return redirect()->route('pedidos.index')->with('success','Pedido actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedido)
    {
        $pedido->delete();
        return redirect()->route('pedidos.index')->with('success','Pedido eliminado.');
    }
}
