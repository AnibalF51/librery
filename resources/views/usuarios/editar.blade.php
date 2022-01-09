@extends('plantilla')


@section('contenido')

<br>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    @if (session('info'))
                                <div class="alert alert-success"><i class="fas fa-check-circle"></i> {{session('info')}}</div>
                            @endif
                        <div class="card card-primary card-outline">
                            
                            <div class="card-header">
                                <h3 class="card-title">Asignacion de Roles</h3>
                            </div>
                            <!-- /.card-header -->

                            <div class="card-body">

                                
                                <div class="form-group">
                                    <label for="nompro">Nombre del usuario</label>
                                    <input type="text" name="nombre" class="form-control" id="nombre" value="{{$user->name}}" readonly="readonly">
                                </div>

                                <div class="form-group">
                                    {!! Form::model($user, ['route'=>['usuarios.update', $user->id], 'method'=>'put']) !!}

                                    @foreach ($roles as $role) 
                                        <div>
                                            <label>
                                                {!! Form::checkbox('roles[]', $role->id, null, ['class'=>'mr-1']) !!}
                                                {{$role->name}}
                                            </label>
                                        </div>
                                    @endforeach
        
                                    {!! Form::submit("Asignar Rol", ['class'=>'btn btn-primary mt-2']) !!}
        
                                    {!! Form::close() !!}  
                                </div>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        
                        






                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>


@endsection
