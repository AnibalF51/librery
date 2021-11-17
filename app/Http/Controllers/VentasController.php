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


    public function update(Request $request, $id){
        $modVen = Ventas::findOrFail($id);
        $modVen->nombre = $request->nombre;
        $modVen->grado = $request->grado;
        $modVen->fecha = $request->fecha;
        $modVen->telefono = $request->telefono;
        $modVen->plan = $request->plan;
        $modVen->observaciones = $request->observaciones; 
        $modVen->save();


        $fac = Ventas::findOrFail($id);
        $tab = Detalles::all();
        $total=0;
        foreach($tab as $tt){
            if($tt->ventaid ==$id){
                $total = $total +($tt->canpro * $tt->preupro);
            }
           
        }
   
       return view('ventas.editar',compact('fac','tab','total'));

        $ten="txt";
       $a=0;
        $tem="a";
       while($a>=0){
           $a=$a+1;
           $tem=$ten.(string)$a;
        if(($request->input($ten.(string)$a))!=null){
            $modDet = Detalles::findOrFail($request->input((string)$a));
            $modDet->estpro = $request->input("est".(string)$a);
            $modDet->save();

        }else{
            $a=-1;
        }
        
       }
       $ven = Ventas::all();
        return view('ventas.list', compact('ven'));

    }

    public function estado($id){
        $modDet = Detalles::findOrFail($id);
        if($modDet->estpro =="Pendiente"){
            $modDet->estpro ="Entregado";
        }else{
            $modDet->estpro ="Pendiente";
        }
        $modDet->save();


        $dd = Detalles::findOrFail($id);
        $fac = Ventas::findOrFail($dd->ventaid);
        $tab = Detalles::all();
        $total=0;
        foreach($tab as $tt){
            if($tt->ventaid ==$id){
                $total = $total +($tt->canpro * $tt->preupro);
            }
           
        }
   
       return view('ventas.editar',compact('fac','tab','total'));
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
       $tab = Detalles::all();
       return view('ventas/detalle',compact('fac','tab'));
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

     public function list(){
        $ven = Ventas::all();
        return view('ventas.list', compact('ven'));
     }

     public function editar($id){
        $fac = Ventas::findOrFail($id);
        $tab = Detalles::all();
        $total=0;
        foreach($tab as $tt){
            if($tt->ventaid ==$id){
                $total = $total +($tt->canpro * $tt->preupro);
            }
           
        }
   
       return view('ventas.editar',compact('fac','tab','total'));
     }

    public function print($id)
    {
        $fac = Ventas::findOrFail($id);
        $tab = Detalles::all();
        $total=0;
        foreach($tab as $tt){
            if($tt->ventaid ==$id){
                $total = $total +($tt->canpro * $tt->preupro);
            }
           
        }
   
       return view('ventas.print',compact('fac','tab','total'));
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
