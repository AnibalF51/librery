<?php

namespace App\Http\Controllers;

use App\Models\Ventas;
use App\Models\Productos;
use App\Models\Detalles;
use Illuminate\Http\Request;

class VentasController extends Controller
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


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produc = Productos::all();
        return view('ventas/registro',compact('produc'));
    }

    public function guardar(Request $request){ 
        $venta = new Ventas();
        $venta->nombre = $request->nombre;
        $venta->grado = $request->grado;
        $venta->fecha = $request->fecha;
        $venta->telefono = $request->telefono;
        $venta->plan = $request->plan;
        $venta->observaciones = $request->observaciones; 
        $venta->save();
        
        $fac = Ventas::all()->last();

       $ten="id";
       $a=0;
        $tem="a";
       while($a>=0){
           $a=$a+1;
           $tem=$ten.(string)$a;
        if(($request->input($ten.(string)$a))!=null){

            $deta = new Detalles();
            $deta->ventaid = $fac->id;
            $deta->proid = $request->input("id".(string)$a);
            $deta->npro = $request->input("txt".(string)$a);
            $deta->canpro = $request->input("cant".(string)$a);
            $deta->preupro = $request->input("pu".(string)$a);
            $deta->estpro = $request->input("est".(string)$a);
            $deta->save();

            /*
  $table->integer('proid');
            $table->string('npro');
            $table->integer('canpro');
            $table->integer('preupro');
            $table->string('estpro');

            echo $request->input("id".(string)$a);
            echo $request->input("txt".(string)$a);
            echo $request->input("cant".(string)$a);
            echo $request->input("pu".(string)$a);
            echo $request->input("tt".(string)$a);
            echo $request->input("est".(string)$a);

            */
        }else{
            $a=-1;
        }
        
       }
       return view('index');
        /*
        if($venta->nombre === '' || $venta->grado=== ''){
            echo json_encode('error');
        }else{
            echo json_encode('Correcto: <br>Usuario:'.$venta->nombre.'<br>Pass:'.$venta->nombre);
        }
    */
       // return view('ventas/index');
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
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function show(Ventas $ventas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function edit(Ventas $ventas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Ventas $ventas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ventas  $ventas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ventas $ventas)
    {
        //
    }
    
}
