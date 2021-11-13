<?php

namespace App\Http\Controllers;

use App\Models\Productos;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produc = Productos::all();
        return view('productos/index', compact('produc'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('productos/registro');
    }

    public function guardar(Request $request)
    {
        $producto = new Productos();
        $producto->nombre = $request->nompro;
        $producto->descripcion = $request->descripcion;
        $producto->categoria = $request->categoria;
        $producto->precio = $request->precio;
        $producto->existencia = $request->existencia;
        $producto->save();
        return redirect('productos/index');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function edit(Productos $productos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $modproducto = Productos::findOrFail($id);

        
        $modproducto->nombre = $request->nompro;
        $modproducto->descripcion = $request->descripcion;
        $modproducto->categoria = $request->categoria;
        $modproducto->precio = $request->precio;
        $modproducto->existencia = $request->existencia;
        $modproducto->save();
        return redirect('productos/index');
    }

    
    public function editar($id){
        $prodc = Productos::findOrFail($id);
        return view('productos.editar', compact('prodc'));
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Productos  $productos
     * @return \Illuminate\Http\Response
     */
    public function destroy(Productos $productos)
    {
        //
    }
}
