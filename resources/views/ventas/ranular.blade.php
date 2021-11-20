@extends('plantilla')
@section('contenido')

<div class="card card-primary card-outline">
    <div class="card-header">
        <h3 class="card-title">Anular Recibo</h3>
    </div>
    <!-- /.card-header -->

    <div class="card-body">
        <form action="{{ route('ventas.anular',$nue->id) }}"  method="POST" enctype="multipart/form-data"
            id="todo">

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
                            <input type="text" name="nombre" class="form-control" readonly="readonly" value="{{ $nue->nombre }}"
                                id="nombre">
                        </div>
                        <div class="form-group col-sm-4">
                            <label for="grado">Grado</label>
                            <input type="text" name="grado" class="form-control" readonly="readonly" value="{{ $nue->grado }}"
                                id="grado">
                        </div>
                        <div class="form-group col-sm-4">
                            <label>Fecha:</label>
                            <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                <input type="date" class="form-control datetimepicker-input" readonly="readonly"
                                    value="{{ $nue->fecha }}" name="fecha" id="fecha">
        
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-sm-6">
                            <label>No. Telefono</label>
        
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-phone"></i></span>
                                </div>
                                <input type="text" class="form-control" readonly="readonly" value="{{ $nue->telefono }}"
                                    id="telefono" name="telefono">
                            </div>
                            <!-- /.input group -->
                        </div>
        
                        <div class="form-group col-sm-6">
                            <label for="plan">Plan</label>
                            <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control" readonly="readonly"
                                disabled>
                                <option value="{{ $nue->plan }}" readonly="readonly">{{ $nue->plan }}</option>
                                <option value="Diario" readonly="readonly">Diario</option>
                                <option value="Fin de Semana" readonly="readonly">Fin de Semana</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="observaciones">Observaciones</label>
                                <textarea rows="5" class="form-control" value="{{ $nue->observaciones }}" name="observaciones"
                                    id="observaciones" readonly="readonly"> {{ $nue->observaciones }}</textarea>
        
                            </div>
                        </div>
                    </div>
        
        
                </div>
        
        
        
            </div>


            <div class="card card-primary card-outline">
                <div class="card-header">
                    <h3 class="card-title">Justificacion</h3>
                </div>
                <!-- /.card-header -->
        
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="observaciones">Razon por la que anula el recibo</label>
                                <textarea rows="5" class="form-control"  name="razon"
                                    id="razon"  required></textarea>
        
                            </div>
                        </div>
                    </div>
        
        
                </div>
        
        
        
            </div>
            <button type="submit" class="btn btn-primary col-sm-12"><i class="fas fa-save"></i>
                Registrar</button>
        </form>

    </div>
    <!-- /.card-body -->
</div>


@endsection
