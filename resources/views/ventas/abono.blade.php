@extends('plantilla')

@can('ventas.abono')

@section('contenido')
    <form action="{{ route('ventas.gabono',$fac->id) }}" method="POST" enctype="multipart/form-data" id="todo">

        @csrf
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Registro de venta</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">

                                <div class="row">


                                    <div class="form-group col-sm-4">
                                        <label for="nombre">Nombre</label>
                                        <input type="text" name="nombre" class="form-control" readonly="readonly"
                                            value="{{ $fac->nombre }}" id="nombre">
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <label for="grado">Grado</label>
                                        <input type="text" name="grado" class="form-control" readonly="readonly"
                                            value="{{ $fac->grado }}" id="grado">
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
                                            <input type="text" class="form-control" readonly="readonly"
                                                value="{{ $fac->telefono }}" id="telefono" name="telefono">
                                        </div>
                                        <!-- /.input group -->
                                    </div>

                                    <div class="form-group col-sm-4">
                                        <label for="plan">Plan</label>
                                        <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control"
                                            readonly="readonly" disabled>
                                            <option value="{{ $fac->plan }}" readonly="readonly">{{ $fac->plan }}
                                            </option>
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
                                            <input type="number" class="form-control" id="abono" name="abono"
                                                value="{{ $fac->abono }}" readonly="readonly">
                                        </div>
                                        <!-- /.input group -->
                                    </div>
                                </div>

                            </div>

                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Total a abonar</h3>
                            </div>

                            <div class="card-body">
                                <div class="form-group col-sm-4">
                                    <label>Abonar</label>

                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text"><i class="fas fa-money-bill-wave"></i></span>
                                        </div>
                                        <input type="number" min="1" class="form-control" id="abs" name="abs"
                                            max="{{ $total - $fac->abono }}" required>
                                    </div>
                                    <!-- /.input group -->
                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                    <button type="submit" class="btn btn-primary col-sm-12"><i class="fas fa-save"></i>
                        Registrar</button>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>

    </form>
@endsection

    
@endcan