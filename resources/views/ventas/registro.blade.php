@extends('plantilla')
@section('contenido')

    <script type="text/javascript ">
        function nuevos() {

            const $select = document.querySelector("#seleccion");
            const indice = $select.selectedIndex;
            if (indice === -1) return; // Esto es cuando no hay elementos
            const opcionSeleccionada = $select.options[indice];
            //alert(`Texto: ${opcionSeleccionada.text}. Valor: ${opcionSeleccionada.value}`);
            //ESTADO DE PRODUCTO
            const $sel = document.querySelector("#estado");
            const ins = $sel.selectedIndex;
            if (ins === -1) return; // Esto es cuando no hay elementos
            const final = $sel.options[ins];
            //FIN ESTADO PRODUCTO

            const cant = document.querySelector("#cantidad");

            let total = Number(opcionSeleccionada.value) * Number(cant.value);

            $('#prin').append(
                "<tr class='rr'> <td class='tt'> " + opcionSeleccionada.id + "'</td> <td class='tt'>" +
                opcionSeleccionada.text + "</td>  <td class='tt'>" +
                cant.value + "</td>  <td class='tt'>Q." + opcionSeleccionada.value + "</td>  <td class='tt'>Q." +
                total + " </td>  <td class='tt'>" +
                final.value +
                "</td> <td class='tt'><a class='btn btn-danger' onclick='quitar()'><i class='fas fa-trash-alt'></i></a></td> </tr>"
            )
        }


        function guardar() {
            var myTableArray = [];

            $("table#tableexample1 tr").each(function() {
                var arrayOfThisRow = [];
                var tableData = $(this).find('td');
                if (tableData.length > 0) {
                    tableData.each(function() {
                        arrayOfThisRow.push($(this).text());
                    });
                    myTableArray.push(arrayOfThisRow);
                }
            });

            alert(myTableArray);
            /*
                        let a = document.getElementById("grado");
                        $.ajax({
                            type: 'POST',
                            url: '/ventas/guardar',
                            dataType: 'json',
                            data: { tot: "JPLA"
                            },success: function (res) {
                                alert("Correcto");
                            }
                            ,error: function (res) {
                                alert("iiCorrecto");
                            }

                        });
                        
                        $.ajaxSetup({
                            headers: {
                                'X-CSRF-TOKEN': $("meta[name='csrf-token']").attr('content')
                            }
                        });
                        var cadena = JSON.stringify(myTableArray);
                   $.post({
                   type: "POST",
                   url: "www.google.com",
                   datatype: 'JSON',
                   data: { "cadena" : cadena },
                   success: function(data){
                        console.log("success:",data);
                    },
                   failure: function(errMsg) {
                        alert("error:",errMsg);
                   }
                });
            */
        }



        function quitar() {

            var myTableArray = [];

            $("table#tableexample1 tr").each(function() {
                var arrayOfThisRow = [];
                var tableData = $(this).find('td');
                if (tableData.length > 0) {
                    tableData.each(function() {
                        arrayOfThisRow.push($(this).text());
                    });
                    myTableArray.push(arrayOfThisRow);
                }
            });

            alert(myTableArray.length);



            // var select = document.querySelector('.rr');
            //  var inner = select.querySelectorAll('.tt');
            //var inner = container.querySelectorAll('tr > td');

            //  alert(inner.length);  //    CANTIDAD DE ELEMENTOS
            // alert(inner[2]);

            /*
            indice = $(this).parent().index();

            
            cells = table.getElementsByTagName('td');

            const ab = document.getElementById("aa");
            
            ab.value = table;  */
        }
    </script>

    <script type="text/javascript">
        function datos(opcion) {
            const $select = document.querySelector("#seleccion");


            const indice = $select.selectedIndex;
            if (indice === -1) return; // Esto es cuando no hay elementos
            const opcionSeleccionada = $select.options[indice];
            //alert(`Texto: ${opcionSeleccionada.text}. Valor: ${opcionSeleccionada.value}`);

            var inputNombre = document.getElementById("pres");

            inputNombre.value = opcionSeleccionada.value;


            //ENVIO DEL ID
            /*
                var combo = document.getElementById("seleccion");
            var selected = combo.options[combo.selectedIndex].id;


                var aa = document.getElementById("cantidad");

                aa.value = selected;  */
        }
        const opcionCambiada = () => {
            console.log("Cambio");
        };

        $select.addEventListener("change", opcionCambiada);
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>



    <meta name="csrf-token" content="{{ csrf_token() }}">

    <form action="{{ route('ventas.guardar') }}" method="POST" enctype="multipart/form-data">

        @csrf


        <!-- /.DATOS CITA -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Registro de venta</h3>
            </div>
            <!-- /.card-header -->

            <div class="card-body">

                <div class="row">


                    <div class="form-group col-sm-4">
                        <label for="nombre">Nombre</label>
                        <input type="text" name="nombre" class="form-control" id="nombre">
                    </div>
                    <div class="form-group col-sm-4">
                        <label for="grado">Grado</label>
                        <input type="text" name="grado" class="form-control" id="grado">
                    </div>
                    <div class="form-group col-sm-4">
                        <label>Fecha:</label>
                        <div class="input-group date" id="reservationdate" data-target-input="nearest">
                            <input type="date" class="form-control datetimepicker-input" name="fecha" id="fecha">

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
                            <input type="text" class="form-control" id="telefono" name="telefono">
                        </div>
                        <!-- /.input group -->
                    </div>

                    <div class="form-group col-sm-6">
                        <label for="plan">Plan</label>
                        <select name="plan" id="plan" value="{{ old('plan') }}" class="form-control">
                            <option value="Diario">Diario</option>
                            <option value="Fin de Semana">Fin de Semana</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="form-group">
                            <label for="observaciones">Observaciones</label>
                            <textarea rows="5" class="form-control" name="observaciones" id="observaciones"
                                placeholder="Observaciones"> </textarea>

                        </div>
                    </div>
                </div>


                <div class="row">
                    <div class="form-group col-sm-6" load="datos()">
                        <label>Buscar Producto</label>
                        <select class="form-control select2 select2-hidden-accessible" style="width: 100%;"
                            data-select2-id="1" tabindex="-1" aria-hidden="true" onchange="datos(this)" id="seleccion">
                            <option selected="selected" value="Seleccione una opcion">Seleccione una opcion</option>
                            @foreach ($produc as $product)
                                <option data-select2-id="{{ $product->nombre }}" id="{{ $product->id }}"
                                    value="{{ $product->precio }}">
                                    {{ $product->nombre }}</option>
                            @endforeach
                        </select>

                    </div>
                    <div class="form-group col-sm-1">
                        <label for="cantidad">Cantidad</label>
                        <input type="text" name="cantidad" class="form-control" id="cantidad">
                    </div>
                    <div class="form-group col-sm-1">
                        <label for="cantidad">Precio/u</label>

                        <input type="text" name="cantidad" class="form-control" id="pres" readonly="readonly">


                    </div>
                    <div class="form-group col-sm-2">
                        <label for="estado">Estado</label>
                        <select name="estado" id="estado" value="{{ old('estado') }}" class="form-control">
                            <option value="Entregado">Entregado</option>
                            <option value="Pendiente">Pendiente</option>
                        </select>
                    </div>
                    <div class="form-group col-sm-2">
                        <label>Accion</label>
                        <button type="button" class="btn btn-primary col-sm-12" onclick="nuevos()"><i
                                class="fas fa-plus"></i>
                            Agregar</button>
                    </div>
                </div>


            </div>
            <!-- /.card-body -->
        </div>
        <!-- FIN DATOS CITAS -->


        <div class="card-body">
            <table id="tableexample1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio/Unitario</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody id="prin">
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
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Precio/Unitario</th>
                        <th>Total</th>
                        <th>Estado</th>
                        <th>Acciones</th>

                    </tr>
                </tfoot>
            </table>
        </div>

        <button type="button" onclick="guardar()" class="btn btn-primary col-sm-12"><i class="fas fa-save"></i>
            Registrar</button>
    </form>



@endsection
