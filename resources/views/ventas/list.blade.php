@extends('plantilla')

@can('ventas.list')
@section('contenido')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Recibos</h3>
                    </div>





                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Fecha</th>
                                    <th>Plan</th>
                                    <th>Abonado</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ven as $ve)
                                    <tr>
                                        <td>{{ $ve->id }}</td>
                                        <td>{{ $ve->nombre }}</td>

                                        <td>{{ $ve->grado }}</td>
                                        <td>{{ $ve->fecha }}</td>
                                        <td>{{ $ve->plan }}</td>
                                        <td>
                                            @if ($ve->abono != 0)
                                                Q. {{ $ve->abono }}
                                            @else
                                                Q. {{ $ve->total }}
                                            @endif
                                        </td>
                                        <td>Q. {{ $ve->total }}</td>

                                        <td>
                                            @if ($ve->estado == 'Activo')
                                                <a href="{{ route('ventas.editar', $ve->id) }}" class="btn btn-warning"
                                                    title="Editar"><i class="fas fa-user-edit"></i></a>
                                            @endif
                                            <a href="{{ route('ventas.print', $ve->id) }}" target="_blank"
                                                class="btn btn-secondary" title="Imprimir"><i
                                                    class="fas fa-print"></i></a>
                                            @if ($ve->estado == 'Activo')
                                                <a href="{{ route('ventas.ranular', $ve->id) }}"
                                                    class="btn btn-danger" title="Anular"><i
                                                        class="fas fa-minus-square"></i></a>
                                            @endif
                                            @if ($ve->estado == 'Activo')
                                                @if ($ve->abono < $ve->total && $ve->abono > 0)
                                                    <a href="{{ route('ventas.abono', $ve->id) }}"
                                                        class="btn btn-success" title="Abonar"><i
                                                            class="fas fa-money-bill-wave"></i></a>
                                                @endif
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Grado</th>
                                    <th>Fecha</th>
                                    <th>Plan</th>
                                    <th>Abonado</th>
                                    <th>Total</th>
                                    <th>Acciones</th>
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