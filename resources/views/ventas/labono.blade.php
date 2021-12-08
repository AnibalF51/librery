@extends('plantilla')

@section('contenido')

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card card-primary card-outline">
                        <div class="card-header">
                            <h3 class="card-title">Lista de Abonos</h3>
                        </div>





                        <!-- /.card-header -->
                        <div class="card-body">

                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>No. Recibo</th>
                                        <th>Nombre</th>
                                        <th>Total Abonado</th>
                                        <th>Dependiente</th>
                                        <th>Fecha y hora</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($abb as $ab)
                                        <tr>
                                            <td>{{ $ab->id }}</td>
                                            <td>{{ $ab->idfac }}</td>
                                            <td>{{ $ab->nombre }}</td>
                                            <td>{{ $ab->abono }}</td>
                                            @foreach ($us as $u)
                                                @if ($u->id == $ab->usuario)
                                                    <td>{{ $u->name }}</td>
                                                @endif
                                            @endforeach
                                            <td>{{ $ab->created_at }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>No. Recibo</th>
                                        <th>Nombre</th>
                                        <th>Total Abonado</th>
                                        <th>Dependiente</th>
                                        <th>Fecha y hora</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>









@endsection
