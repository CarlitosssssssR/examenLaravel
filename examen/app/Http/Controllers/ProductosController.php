<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $productos = Productos::orderBy('id','desc')->paginate(10);
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('productos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'codigo_producto' => 'required|string|unique:productos,codigo_producto',
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
        ]);

        Productos::create($data);

        return redirect()->route('productos.index')->with('success','Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $producto)
    {
        return view('productos.show', ['producto' => $producto]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        return view('productos.edit', ['producto' => $producto]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Productos $producto)
    {
        $data = $request->validate([
            'codigo_producto' => 'required|string|unique:productos,codigo_producto,'.$producto->id,
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
            'stock' => 'nullable|integer|min:0',
        ]);

        $producto->update($data);

        return redirect()->route('productos.index')->with('success','Producto actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto)
    {
        $producto->delete();
        return redirect()->route('productos.index')->with('success','Producto eliminado.');
    }
}
