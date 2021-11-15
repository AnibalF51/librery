

// INICIO PRUEBAS DE ENVIO DE DATOS POST
var formulario = document.getElementById('todo');

<script src="{{ mix('js/app.js') }}"></script>

formulario.addEventListener('submit', function (e) {
    e.preventDefault();
    console.log('HOLA');

    let datos =new FormData(formulario);
    console.log(datos);
    console.log(datos.get('nombre'));

    fetch(route('ventas.guardar'),{
        method: 'POST',
        body: datos
    })

});



//-------------------------------------------------------------------------

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



function guardar() {
    var myTableArray = [];

    $("table#tableexample1 tr").each(function () {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
            tableData.each(function () {
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
//FIN PRUEBAS


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
        "<tr class='rr'> <td class='tt'> " + opcionSeleccionada.id + "</td> <td class='tt'>" +
        opcionSeleccionada.text + "</td>  <td class='tt'>" +
        cant.value + "</td>  <td class='tt'>Q." + opcionSeleccionada.value + "</td>  <td class='tt'>Q." +
        total + " </td>  <td class='tt'>" +
        final.value +
        "</td> <td class='tt'><a class='btn btn-danger' onclick='quitar()'><i class='fas fa-trash-alt'></i></a></td> </tr>"
    )
}






function quitar() {

    var myTableArray = [];

    $("table#tableexample1 tr").each(function () {
        var arrayOfThisRow = [];
        var tableData = $(this).find('td');
        if (tableData.length > 0) {
            tableData.each(function () {
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



