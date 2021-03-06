@extends('plantilla')
@can('ventas.registro')
@section('contenido')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">

                <meta name="csrf-token" content="{{ csrf_token() }}">

                <form action="{{ route('ventas.guardar') }}" method="POST" enctype="multipart/form-data" id="todo">

                    @csrf


                    <!-- /.DATOS CITA -->
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Registro de venta</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row">


                                <div class="form-group col-sm-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="grado">Grado</label>
                                    <input type="text" name="grado" class="form-control" id="grado" required>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Fecha:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input" name="fecha"
                                            id="fecha" required>

                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-sm-4">
                                    <label>No. Telefono</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="telefono" name="telefono">
                                    </div>
                                    <!-- /.input group -->
                                </div> 

                                <div class="form-group col-sm-4">
                                    <label for="plan">Plan</label>
                                    <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control">
                                        <option value="Diario">Diario</option>
                                        <option value="Fin de Semana">Fin de Semana</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Abono</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        </div>
                                        <input type="number" class="form-control" id="abono" name="abono" value="0" min="0">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <!--OCULTAR ELEMENTOS
                            style="visibility:hidden;"
                         -->
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea rows="5" class="form-control" name="observaciones"
                                            id="observaciones" placeholder="Observaciones"> </textarea>

                                    </div>
                                </div>
                            </div> 

                            <div class="mt-3" id="respuesta">

                            </div>
                            <div class="row">
                                <div class="form-group col-sm-6" load="datos()">
                                    <label>Buscar Producto</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        onchange="datos(this)" data-select2-id="1" tabindex="-1" aria-hidden="true"
                                        id="seleccion">
                                        <option selected="selected" value="Seleccione una opcion">Seleccione una opcion
                                        </option>
                                        @foreach ($produc as $product)
                                            <option data-select2-id="{{ $product->id }}" name="{{ $product->id }}"
                                                value="{{ $product->precio }}">{{ $product->id }} :
                                                {{ $product->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-1">
                                    <label for="cantidad">Cantidad</label>
                                    <input type="number" name="cantidad" class="form-control" id="cantidad">
                                </div>
                                <div class="form-group col-sm-1">
                                    <label for="cantidad">Precio/u</label>

                                    <input type="number" name="cantidad" class="form-control" id="pres" min="1" max="10" readonly="readonly">


                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="estado">Estado</label>
                                    <select name="estado" id="estado" value="{{ old('estado') }}"
                                        class="form-control">
                                        
                                        <option value="Entregado">Entregado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-2">
                                    <label>Accion</label>
                                    <button type="button" class="btn btn-primary col-sm-12" onclick="nuevos()"><i
                                            class="fas fa-plus"></i>
                                        Agregar</button>
                                </div>
                            </div>


                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- FIN DATOS CITAS -->


                    <div class="card-body">
                        <table id="tableexample1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>Estado </th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio/Unitario</th>
                                    <th>Total</th>
                                    <th>Estado</th>

                                </tr>
                            </thead>
                            <tbody id="prin">
                                <!--
                                        <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td>Q.</td>
                                            <td>Q. </td>
                                            <td></td>
                                            <td></td>

                                        </tr>
                                    -->
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>Estado</th>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio/Unitario</th>
                                    <th>Total</th>
                                    <th>Estado</th>


                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="row">
                                <div class="form-group col-sm-10" style="text-align:right ">
                                    <label style="font-size:150%">Total</label>
                                   
                                </div>
                                <div class="form-group col-sm-2">
                                <input type="number" name="cal" class="form-control" id="cal" readonly="readonly">
                                </div>
                                
                            </div>
                    <button type="submit" class="btn btn-primary col-sm-12"><i class="fas fa-save"></i>
                        Registrar</button>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>
<script src="{{ asset('js/registros.js') }}"></script>
<script src="{{ asset('js/enviar.js') }}"></script>
<script src="{{ asset('js/calculos.js') }}"></script>
@endsection

@endcan