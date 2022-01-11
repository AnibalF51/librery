@extends('plantilla')

@can('productos.index')
@section('contenido')

<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline">
                    <div class="card-header">
                        <h3 class="card-title">Lista de Productos</h3>
                    </div>





                    <!-- /.card-header -->
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Existencia</th>
                                    <th>Acciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produc as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>{{ $product->nombre }}</td>

                                        <td>{{ $product->descripcion }}</td>
                                        <td>{{ $product->categoria }}</td>
                                        <td>Q. {{ $product->precio }}</td>
                                        <td>{{ $product->existencia }}</td>

                                        <td>
                                            <a href="{{ route('productos.editar', $product->id) }}"
                                                class="btn btn-warning" title="Editar"><i
                                                    class="fas fa-user-edit"></i></a>
                                            <a href="{{ route('productos.agregar', $product->id) }}"
                                                class="btn btn-success" title="Ingreso de Producto"><i
                                                    class="fas fa-plus-square"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th>ID</th>
                                    <th>Nombre</th>
                                    <th>Descripcion</th>
                                    <th>Categoria</th>
                                    <th>Precio</th>
                                    <th>Existencia</th>
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