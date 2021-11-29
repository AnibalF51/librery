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
                <h3>LIBRERIA PRIMICIA</h3>
                <h5>3a. Avenida 8-32 Zona 10 Barrio La Libertad Coban, Alta Verapaz</h5>
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
            <p class="col-sm-5">Reporte correpondiate al dia: {{ $ven[0]->fecha }}</p>
            <p class="col-sm-3">Generado por: <b>{{ auth()->user()->name }}</b> </p>
        </div>




    </div>


    <div class=" card card-primary card-outline">
        <h2>Recibos Activos</h2>
        <table id="tableexample1" class="table table-sm ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Dependiente</th>
                    <th>Total</th>

                </tr>
            </thead>
            <tbody id="prin">

                @foreach ($ven as $ve)
                    @if ($ve->estado == 'Activo')
                        <tr>
                            <td>{{ $ve->id }}</td>
                            <td>{{ $ve->nombre }}</td>
                            <td>{{ $ve->grado }}</td>
                            @foreach ($us as $use)
                                @if ($use->id == $ve->usuario)
                                    <td>{{ $use->name }}</td>
                                @endif
                            @endforeach
                            <td>Q.{{ $ve->total }} </td>

                        </tr>
                    @endif
                @endforeach

            </tbody>

        </table>
        <div class="row">

            <label for="Total" class="col-sm-9">
                <h3> Total</h3>
            </label>
            <label for="Total" class="col-sm-3">
                <h3> Q.{{ $tot }}</h3>
            </label>

        </div>

        <hr>
    </div>

    <div class=" card card-primary card-outline">
        <h2>Recibos Anulados</h2>
        <table id="tableexample1" class="table table-sm ">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Grado</th>
                    <th>Generado por</th>
                    <th>Anulado por</th>
                    <th>Total</th>

                </tr> 
            </thead>
            <tbody id="prin">

                @foreach ($ven as $ve)
                    @if ($ve->estado == 'Anulado')
                        <tr>
                            <td>{{ $ve->id }}</td>
                            <td>{{ $ve->nombre }}</td>
                            <td>{{ $ve->grado }}</td>
                            @foreach ($us as $use)
                                @if ($use->id == $ve->usuario)
                                    <td>{{ $use->name }}</td>
                                @endif
                            @endforeach
                            @foreach ($anu as $aa)
                                @if ($aa->ventaid==$ve->id)
                                    @foreach ($us as $uu)
                                        @if ($uu->id==$aa->usuarioid)
                                            <td>{{$uu->name}}</td>
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                            <td>Q.{{ $ve->total }} </td>

                        </tr>
                    @endif
                @endforeach

            </tbody>

        </table>
 

        <hr>
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
