<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Primicia</title>

    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!-- Ekko Lightbox -->
    <link rel="stylesheet" href="../plugins/ekko-lightbox/ekko-lightbox.css">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- dropify -->
    <link rel="stylesheet" href="path-to/node_modules/dropify/dist/css/dropify.min.css">
</head>

<body>

    <div class="card-body">
        <div class="row">
            <div class="class=col-sm-9">
                <center><h3>PRIMICIA</h3></center>
                <h4>3a. Avenida 8-32 Zona 10 Barrio La Libertad Coban, Alta Verapaz</h4>
            </div>
            <div class="col-sm-2">
                
            </div>
            <div class="col-sm-1">
                <div class="d-flex justify-content-start">
                    <img src="{{ asset('dist/img/prim.ico') }}" width="150px">
                </div>
            </div>
        </div>
        
        
        <div class="row">
            <p class="col-sm-5">ZOILA IMENA LOPEZ RODAS</p>
            <p class="col-sm-4">NIT. 29182395</p>
            <p class="col-sm-3">No. <b>{{ $fac->id }}</b> </p>
        </div>




    </div>
    <div class="card card-primary card-outline">
        

        <div class="card-header">
            <h3 class="card-title">Datos</h3>
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
                <div class="form-group col-sm-6">
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

                <div class="form-group col-sm-6">
                    <label for="plan">Plan</label>
                    <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control" readonly="readonly"
                        disabled>
                        <option value="{{ $fac->plan }}" readonly="readonly">{{ $fac->plan }}</option>
                        <option value="Diario" readonly="readonly">Diario</option>
                        <option value="Fin de Semana" readonly="readonly">Fin de Semana</option>
                    </select>
                </div>
            </div>
            @if ($fac->observaciones != '')
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea rows="2" class="form-control" value="{{ $fac->observaciones }}"
                                name="observaciones" id="observaciones" readonly="readonly">{{ $fac->observaciones }} </textarea>

                        </div>
                    </div>
                </div>
            @endif



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
            
        </table>
        
        <div class="row">
            
            <label for="Total" class="col-sm-9"><h3> Total</h3> </label>
            <label for="Total" class="col-sm-3"><h3> Q.{{$total}}</h3> </label>
            
        </div>
        <hr>
    </div>
    </div>

    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- DataTables  & Plugins -->
    <script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('plugins/jszip/jszip.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/pdfmake.min.js') }}"></script>
    <script src="{{ asset('plugins/pdfmake/vfs_fonts.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
    <script src="{{ asset('plugins/datatables-buttons/js/buttons.colVis.min.js') }}"></script>
    <!-- Page specific script -->

    <script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
    <!-- Filterizr-->
    <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js') }}"></script>
    <!-- Ekko Lightbox -->
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.min.js') }}"></script>

    <script src="https://cdnjs.cloudfare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script type="asset/js/dropify.min.js"></script>
    <script>
        window.addEventListener("load", window.print());
    </script>
</body>

</html>
