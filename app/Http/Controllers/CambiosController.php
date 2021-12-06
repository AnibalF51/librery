<?php

namespace App\Http\Controllers;

use App\Models\Cambios;
use App\Models\Productos;
use Illuminate\Http\Request;

class CambiosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function guardar(Request $request)
    {
        $prod = Productos::findOrFail($request->seleccion1);
        $prods = Productos::findOrFail($request->seleccion2);
        $cam = new Cambios();
        $cam->referencia = $request->referencia;
        $cam->nombre1 = $prod->nombre;
        $cam->estado1 = $request->estado1;
        $cam->cantidad1 = $request->cantidad1;
        $cam->nombre2 = $prods->nombre;
        $cam->estado2 = $request->estado2;
        $cam->cantidad2 = $request->cantidad2;
        $cam->dependiente = auth()->user()->name;
        

        
        if(($request->estado1)=="Entregado"){
           
            $prod->existencia =((double)($prod->existencia)) +((double)($request->cantidad1));
            $prod->save();
        }
        if(($request->estado2)=="Entregado"){
           
            $prods->existencia =((double)($prods->existencia)) -((double)($request->cantidad2));
            $prods->save();
        }
        $cam->save();
        return redirect('cambios/list');

    }

    /*
    $table->string('referencia');
            $table->string('nombre1');
            $table->string('estado1');
            $table->integer('cantidad1');
            $table->string('nombre2');
            $table->string('estado2');
            $table->integer('cantidad2');
            $table->string('dependiente');
    */

    public function registro(){
        $produc = Productos::all();

        return view('cambios/registro',compact('produc'));
    }
    public function list(){
        $datos = Cambios::all();

        return view('cambios/list', compact('datos'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
     * @param  \App\Models\Cambios  $cambios
     * @return \Illuminate\Http\Response
     */
    public function show(Cambios $cambios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cambios  $cambios
     * @return \Illuminate\Http\Response
     */
    public function edit(Cambios $cambios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cambios  $cambios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cambios $cambios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cambios  $cambios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cambios $cambios)
    {
        //
    }
}
