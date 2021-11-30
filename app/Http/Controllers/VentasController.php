<?php

namespace App\Http\Controllers;

use App\Models\Adetalles;
use App\Models\Ventas;
use App\Models\User;
use App\Models\Productos;
use App\Models\Detalles;
use App\Models\Anulars;
use Illuminate\Support\Facades\DB;
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

    //ANULACION DE RECIBOS
    public function anular(Request $request, $id)
    {
        //CREACION DEL REGISTRO DE LA ANULACION DEL RECIBO
        $det = new Anulars();
        $det->ventaid = $id;
        $det->usuarioid = auth()->user()->id;
        $det->razon = $request->razon;
        $det->save();

        //REGISTRO DE ESTADO DEL RECIBOS
        $ventt = Ventas::findOrFail($id);
        $ventt->estado = "Anulado";
        $ventt->save();
        //MODIFICACION DE LA EXISTENCIA DEL PRODUCTO Y DEL ESTADO DEL DETALLE DEL RECIBO
        $dett = DB::table('detalles')
            ->where('ventaid', '=', $id)
            ->get();

        foreach ($dett as $d) {
            if ($d->estpro == "Entregado") {
                $pro = Productos::findOrFail($d->proid);
                $pro->existencia = ((float)$pro->existencia) + ((float)$d->canpro);
                $pro->save();
            } else {
                $temp = Detalles::findOrFail($d->id);
                $temp->estpro = "Entregado";
                $temp->save();
            }
        }

        return redirect()->route('ventas.list');
    }

    //VISTA PARA LA DESCRIPCION DEL RECIBO
    public function ranular($id)
    {
        $nue = Ventas::findOrFail($id);

        return view('ventas/ranular', compact('nue'));
    }

    //IMPRESIONRE DE REPORTE POR DIA
    public function pdia(Request $request)
    {
        $ven = DB::table('ventas')
            ->where('fecha', '=', $request->fecha1)
            ->get();
        $us = User::all();
        $tot = 0;
        foreach ($ven as $ve) {
            if ($ve->estado == "Activo") {
                $tot = $tot + $ve->total;
            }
        }
        $anu = Anulars::All();
        return view('ventas/pdia', compact('ven', 'us', 'tot','anu'));
    }

    //IMPRESION DE REPORTE EN RANGO DE FECHA
    public function prango(Request $request)
    {
        $fech = [$request->fecha2,  $request->fecha3];
        $ven = DB::table('ventas')
            ->whereBetween('fecha', [$request->fecha2,  $request->fecha3])
            ->get();
        $us = User::all();
        $tot = 0;
        foreach ($ven as $ve) {
            if ($ve->estado == "Activo") {
                $tot = $tot + $ve->total;
            }
        }
        $anu = Anulars::All();
        return view('ventas/prango', compact('ven', 'us', 'tot', 'fech','anu'));
    }

    public function create()
    {
        $produc = Productos::all();
        return view('ventas/registro2', compact('produc'));
    }


    public function update(Request $request, $id)
    {
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
        $total = 0;
        foreach ($tab as $tt) {
            if ($tt->ventaid == $id) {
                $total = $total + ($tt->canpro * $tt->preupro);
            }
        }

        return view('ventas.editar', compact('fac', 'tab', 'total'));

        $ten = "txt";
        $a = 0;
        $tem = "a";
        while ($a >= 0) {
            $a = $a + 1;
            $tem = $ten . (string)$a;
            if (($request->input($ten . (string)$a)) != null) {
                $modDet = Detalles::findOrFail($request->input((string)$a));
                $modDet->estpro = $request->input("est" . (string)$a);
                $modDet->save();
            } else {
                $a = -1;
            }
        }
        $ven = Ventas::all();
        return view('ventas.list', compact('ven'));
    }



    public function estado($id)
    {
        $modDet = Detalles::findOrFail($id);
        $pro = Productos::findOrFail($modDet->proid);
        if ($modDet->estpro == "Pendiente") {
            $modDet->estpro = "Entregado";

            $cambio = new Adetalles();
            $cambio->usuario = auth()->user()->id;
            $cambio->recibo = $modDet->ventaid;
            $cambio->producto = $modDet->npro;
            $cambio->cambio = "Entregado";
            $cambio->save();

            $pro->existencia = ((float)$pro->existencia) - ((float)$modDet->canpro);
            $pro->save();
        }
        $modDet->save();


        $dd = Detalles::findOrFail($id);
        $fac = Ventas::findOrFail($dd->ventaid);
        $tab = Detalles::all();
        $total = 0;
        foreach ($tab as $tt) {
            if ($tt->ventaid == $id) {
                $total = $total + ($tt->canpro * $tt->preupro);
            }
        }


        return view('ventas.editar', compact('fac', 'tab', 'total'));
    }

    public function reportes()
    {
        return view('ventas.reportes');
    }

    public function guardar(Request $request)
    {
        $venta = new Ventas();
        $venta->nombre = $request->nombre;
        $venta->grado = $request->grado;
        $venta->fecha = $request->fecha;
        $venta->telefono = $request->telefono;
        $venta->plan = $request->plan;
        $venta->observaciones = $request->observaciones;
        $venta->estado = "Activo";
        $venta->total = 0;
        $venta->usuario = auth()->user()->id;
        $venta->save();




        $fac = Ventas::all()->last();
        $total = 0;
        $ten = "id";
        $a = 0;
        $tem = "a";
        while ($a >= 0) {
            $a = $a + 1;
            $tem = $ten . (string)$a;
            if (($request->input($ten . (string)$a)) != null) {

                $deta = new Detalles();
                $deta->ventaid = $fac->id;
                $deta->proid = $request->input("id" . (string)$a);
                $deta->npro = $request->input("txt" . (string)$a);
                $deta->canpro = $request->input("cant" . (string)$a);
                $deta->preupro = $request->input("pu" . (string)$a);
                $deta->estpro = $request->input("est" . (string)$a);
                $total = $total + ($request->input("cant" . (string)$a) * $request->input("pu" . (string)$a));
                if (($request->input("est" . (string)$a)) == "Entregado") {
                    $proc = Productos::findOrFail($request->input("id" . (string)$a));
                    $proc->existencia = ((float)$proc->existencia) - ((float)$request->input("cant" . (string)$a));
                    $proc->save();
                }
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
            } else {
                $a = -1;
            }
        }

        $modVen = Ventas::findOrFail($fac->id);
        $modVen->total = $total;
        $modVen->save();

        $tab = Detalles::all();
        return view('ventas/detalle', compact('fac', 'tab'));
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

    public function list()
    {
        $ven = Ventas::all();
        return view('ventas.list', compact('ven'));
    }

    public function editar($id)
    {
        $fac = Ventas::findOrFail($id);
        $tab = Detalles::all();
        $total = 0;
        foreach ($tab as $tt) {
            if ($tt->ventaid == $id) {
                $total = $total + ($tt->canpro * $tt->preupro);
            }
        }

        return view('ventas.editar', compact('fac', 'tab', 'total'));
    }

    public function print($id)
    {
        $fac = Ventas::findOrFail($id);
        $tab = Detalles::all();
        $total = 0;
        foreach ($tab as $tt) {
            if ($tt->ventaid == $id) {
                $total = $total + ($tt->canpro * $tt->preupro);
            }
        }

        return view('ventas.print', compact('fac', 'tab', 'total'));
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
