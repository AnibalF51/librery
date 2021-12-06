@extends('plantilla')


@section('contenido')

<br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">


                    <form action="{{ route('productos.guardar') }}" method="POST" enctype="multipart/form-data">

                        @csrf


                        <!-- /.DATOS CITA -->
                        <div class="card card-primary card-outline">
                            <div class="card-header">
                                <h3 class="card-title">Registro de productos</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">

                                <div class="form-group">
                                    <label for="nompro">Nombre del producto</label>
                                    <input type="text" name="nompro" class="form-control" id="nompro" required>
                                </div>


                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <label for="descripcion">Descripcion</label>
                                            <textarea rows="5" class="form-control" name="descripcion" id="descripcion"
                                                placeholder="Descripcion del producto"> </textarea>

                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="categoria">Categoria</label>
                                    <select name="categoria" id="categoria" value="{{ old('categoria') }}"
                                        class="form-control">
                                        <option value="uniforme">Uniforme</option>
                                        <option value="libros">Libros</option>
                                        <option value="kit">Kit</option>
                                        <option value="libreria">Libreria</option>
                                    </select>
                                </div>

                                <div class="row">
                                    <div class="col-sm-12">
                                        <label for="descripcion">Precio</label>
                                        <div class="input-group">

                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Q</span>
                                            </div>
                                            <input type="text" id="precio" name="precio" class="form-control" required>
                                        </div>
                                    </div>
                                </div><br>

                                <div class="form-group">
                                    <label for="existencia">Existencia</label>
                                    <input type="number" name="existencia" class="form-control" id="existencia" required>
                                </div>



                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- FIN DATOS CITAS -->

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
