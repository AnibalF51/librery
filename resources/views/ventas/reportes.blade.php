@extends('plantilla')
@section('contenido')

    <div class="card card-primary card-outline">
        <div class="card-header">
            <h3 class="card-title">Reportes por fecha</h3>
        </div>
        <!-- /.card-header -->

        <div class="card-body">
            <form action="{{ route('ventas.pdia') }}" target="_blank" method="POST" enctype="multipart/form-data"
                id="todo">

                @csrf

                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Por dia:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" name="fecha1" id="fecha1">

                            <button type="submit" class="btn btn-primary col-sm-3" style="margin-left: 10px"><i
                                    class="fas fa-save"></i>
                                Generar</button>
                        </div>
                    </div>

                </div>

            </form>
            <form action="{{ route('ventas.prango') }}" target="_blank" method="POST" enctype="multipart/form-data" id="todo">

                @csrf
                <div class="row">
                    <div class="form-group col-sm-4">
                        <label>Rango de fechas:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" name="fecha2" id="fecha2">
                            <input type="date" class="form-control datetimepicker-input" name="fecha3" id="fecha3"
                                style="margin-left: 10px">

                                <button type="submit" class="btn btn-primary col-sm-3" style="margin-left: 10px"><i class="fas fa-save"></i>
                                    Generar</button>
                        </div>
                       
                    </div>
                </div>
               
            </form>
        </div>
        <!-- /.card-body -->
    </div>

@endsection
