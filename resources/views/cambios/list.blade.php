@extends('plantilla')
@can('cambios.list')
@section('contenido')

<br>


<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Lista de cambios</h3>
                    </div>

                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Referencia</th>
                                    <th>Producto de Recibido - Cantidad</th>
                                    <th>Producto de Dado - Cantidad</th>
                                    <th>Dependiente</th>
                                    <th>Fecha / Hora</th>
                                </tr>
                            </thead>
                            <tbody>
                             @foreach ($datos as $dat)
                                 <tr>
                                     <td>{{$dat->id}}</td>
                                     <td>{{$dat->referencia}}</td>
                                     <td>{{$dat->nombre1}} - {{$dat->cantidad1}}</td>
                                     <td>{{$dat->nombre2}} - {{$dat->cantidad2}}</td>
                                     <td>{{$dat->dependiente}}</td>
                                     <td>{{$dat->created_at}}</td>
                                 </tr>
                             @endforeach
                                   
                              
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Referencia</th>
                                    <th>Producto de Recibido</th>
                                    <th>Producto de Dado</th>
                                    <th>Dependiente</th>
                                    <th>Fecha / Hora</th>
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

@endcan