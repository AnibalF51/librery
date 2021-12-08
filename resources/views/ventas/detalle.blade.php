@extends('plantilla')
@section('contenido')


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
                    <input type="text" name="nombre" class="form-control" readonly="readonly" value="{{ $fac->nombre }}"
                        id="nombre">
                </div>
                <div class="form-group col-sm-4">
                    <label for="grado">Grado</label>
                    <input type="text" name="grado" class="form-control" readonly="readonly" value="{{ $fac->grado }}"
                        id="grado">
                </div>
                <div class="form-group col-sm-4">
                    <label>Fecha:</label>
                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                        <input type="date" class="form-control datetimepicker-input" readonly="readonly"
                            value="{{ $fac->fecha }}" name="fecha" id="fecha">

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
                        <input type="text" class="form-control" readonly="readonly" value="{{ $fac->telefono }}"
                            id="telefono" name="telefono">
                    </div>
                    <!-- /.input group -->
                </div>

                <div class="form-group col-sm-4">
                    <label for="plan">Plan</label>
                    <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control" readonly="readonly"
                        disabled>
                        <option value="{{ $fac->plan }}" readonly="readonly">{{ $fac->plan }}</option>
                        <option value="Diario" readonly="readonly">Diario</option>
                        <option value="Fin de Semana" readonly="readonly">Fin de Semana</option>
                    </select>
                </div>
                <div class="form-group col-sm-4">
                    <label>Total Abono</label>

                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                        </div>
                        <input type="number" class="form-control" id="abono" name="abono" value="{{ $fac->abono }}" readonly="readonly">
                    </div>
                    <!-- /.input group -->
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12">
                    <div class="form-group">
                        <label for="observaciones">Observaciones</label>
                        <textarea rows="5" class="form-control" value="{{ $fac->observaciones }}" name="observaciones"
                            id="observaciones" readonly="readonly"> {{ $fac->observaciones }}</textarea>

                    </div>
                </div>
            </div>


        </div>



    </div>
    <!-- /.card-body -->

    <!-- FIN DATOS CITAS -->


    <div class=" card card-primary card-outline">
        <table id="tableexample1" class="table table-bordered table-striped ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio/Unitario</th>
                    <th>Total</th>
                    <th>Estado</th>

                </tr>
            </thead>
            <tbody id="prin">

                @foreach ($tab as $ta)
                    @if ($ta->ventaid == $fac->id)
                        <tr>
                            <td>{{ $ta->proid }}</td>
                            <td>{{ $ta->npro }}</td>
                            <td>{{ $ta->canpro }}</td>
                            <td>Q.{{ $ta->preupro }} </td>
                            <td>Q.{{ $ta->canpro * $ta->preupro }}</td>
                            <td>{{ $ta->estpro }}</td>

                        </tr>
                    @endif
                @endforeach
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
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio/Unitario</th>
                    <th>Total</th>
                    <th>Estado</th>


                </tr>
            </tfoot>
        </table>
        <a href="{{ route('ventas.print', $fac->id) }}" target="_blank" class="btn btn-warning"><i class="fas fa-print">
            Imprimir</i></a>
    </div>
   
    

@endsection
