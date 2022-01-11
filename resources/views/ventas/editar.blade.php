@extends('plantilla')
@can('ventas.editar')
@section('contenido')

<br>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <form action="{{ route('ventas.update', $fac->id) }}" method="POST" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf


                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Registro de venta</h3>
                        </div>
                        <!-- /.card-header -->

                        <div class="card-body">

                            <div class="row">


                                <div class="form-group col-sm-4">
                                    <label for="nombre">Nombre</label>
                                    <input type="text" name="nombre" readonly="readonly" class="form-control"
                                        value="{{ $fac->nombre }}" id="nombre">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="grado">Grado</label>
                                    <input type="text" name="grado" readonly="readonly" class="form-control"
                                        value="{{ $fac->grado }}" id="grado">
                                </div>
                                <div class="form-group col-sm-4">
                                    <label>Fecha:</label>
                                    <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                        <input type="date" readonly="readonly" class="form-control datetimepicker-input"
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
                                        <input type="text" readonly="readonly" class="form-control"
                                            value="{{ $fac->telefono }}" id="telefono" name="telefono">
                                    </div>
                                    <!-- /.input group -->
                                </div>

                                <div class="form-group col-sm-4">
                                    <label for="plan">Plan</label>
                                    <select name="plan" id="plan" value="{{ old('plan') }}" disabled
                                        class="form-control">
                                        <option value="{{ $fac->plan }}">{{ $fac->plan }}</option>
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
                                        <input type="number" class="form-control" id="abono" name="abono" value="{{ $fac->abono }}" readonly="readonly">
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label for="observaciones">Observaciones</label>
                                        <textarea rows="5" class="form-control" value="{{ $fac->observaciones }}"
                                            name="observaciones"
                                            id="observaciones"> {{ $fac->observaciones }}</textarea>

                                    </div>
                                </div>
                            </div>


                        </div>



                    </div>
                    <!-- /.card-body -->



                    <div class=" card card-primary card-outline">
                        <table id="tableexample1" class="table table-bordered table-striped ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Precio/Unitario</th>
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </thead>
                            <tbody id="prin">

                                @foreach ($tab as $ta)
                                    @if ($ta->ventaid == $fac->id)
                                        <tr>
                                            <td><input type="text" class="form-control" readonly="readonly" size="1"
                                                    value="{{ $ta->id }}" id="{{ $ta->id }}"
                                                    name="{{ $ta->id }}">
                                            </td>
                                            <td><input type="text" class="form-control" readonly="readonly" size="1"
                                                    value="{{ $ta->npro }}" id="txt{{ $ta->id }}"
                                                    name="txt{{ $ta->id }}"></td>
                                            <td><input type="text" class="form-control" readonly="readonly" size="1"
                                                    value="{{ $ta->canpro }}" id="cant{{ $ta->id }}"
                                                    name="cant{{ $ta->id }}"></td>
                                            <td><input type="text" class="form-control" readonly="readonly" size="1"
                                                    value="{{ $ta->preupro }}" id="pu{{ $ta->id }}"
                                                    name="pu{{ $ta->id }}"></td>
                                            <td><input type="text" class="form-control" readonly="readonly" size="1"
                                                    value="{{ $ta->estpro }}" id="est{{ $ta->id }}"
                                                    name="est{{ $ta->id }}"></td>
                                            <td>
                                                @if ($ta->estpro == 'Pendiente')
                                                    <a href="{{ route('ventas.estado', $ta->id) }}"
                                                        class="btn btn-warning"><i class="fas fa-exchange-alt"></i></a>
                                                @endif
                                            </td>


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
                                    <th>Estado</th>
                                    <th>Acciones</th>

                                </tr>
                            </tfoot>
                        </table>
                    </div>


                    <button type="submit" class="btn btn-success col-sm-12"><i class="fas fa-save"></i>
                        Actualizar</button>
                </form>

            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
</section>

@endsection

@endcan