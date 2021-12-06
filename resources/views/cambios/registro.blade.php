@extends('plantilla')
@section('contenido')

    
    <div class="card-header">
        <h2 class="card-title">Registro de cambios</h2>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <form action="{{ route('cambios.guardar') }}" method="POST" enctype="multipart/form-data">

                        @csrf

                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title"><b> Documento de referencia o motivo</b></h3>
                            </div>
                            <div class="row card-body">
                                <input type="text" name="referencia" class="form-control" id="referencia" required>
                                

                            </div>

                        </div>

                        <!-- /PRODUCTO RECIBIDO INICIO-->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Producto Recibido</h3>
                            </div>

                            <div class="row card-body">
                                <div class="form-group col-sm-6">
                                    <label>Buscar Producto</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" id="seleccion1" name="seleccion1">
                                        <option selected="selected" value="Seleccione una opcion">Seleccione una opcion
                                        </option>
                                        @foreach ($produc as $product)
                                            <option data-select2-id="#" 
                                                value="{{ $product->id }}">{{ $product->id }} :
                                                {{ $product->nombre }}</option>
                                        @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="estado">Estado</label>
                                    <select name="estado1" id="estado1" value="{{ old('estado') }}"
                                        class="form-control">
                                        <option value="Entregado">Entregado</option>
                                        <option value="Pendiente">Pendiente</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-1">
                                    <label for="cantidad1">Cantidad</label>
                                    <input type="number" name="cantidad1" class="form-control" id="cantidad1" required>
                                </div>
                            </div>

                        </div>
                        <!-- /PRODUCTO RECIBIDO FIN-->

                        <!-- /PRODUCTO DADO INICIO-->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Producto Entregado</h3>
                            </div>

                            <div class="row card-body">
                                <div class="form-group col-sm-6">
                                    <label>Buscar Producto</label>
                                    <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                                        data-select2-id="1" tabindex="-1" aria-hidden="true" id="seleccion2" name="seleccion2">
                                        <option selected="selected" value="Seleccione una opcion">Seleccione una opcion
                                        </option>
                                        @foreach ($produc as $product)
                                        <option data-select2-id="#" value="{{ $product->id }}">{{ $product->id }}:{{ $product->nombre }}</option>
                                    @endforeach
                                    </select>

                                </div>
                                <div class="form-group col-sm-2">
                                    <label for="estado2">Estado</label>
                                    <select name="estado2" id="estado2" value="{{ old('estado') }}"
                                        class="form-control">
                                        <option value="Entregado">Entregado</option>
                                    </select>
                                </div>
                                <div class="form-group col-sm-1">
                                    <label for="cantidad2">Cantidad</label>
                                    <input type="number" name="cantidad2" class="form-control" id="cantidad" required>
                                </div>
                            </div>

                        </div>
                        <!-- /PRODUCTO DADO FIN-->
                        <button type="submit" class="btn btn-primary col-sm-12"><i class="fas fa-save"></i>
                            Registrar</button>


                    </form>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection
