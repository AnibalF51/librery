

// INICIO PRUEBAS DE ENVIO DE DATOS POST





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
    let aa;
    aa = myTableArray.length + 1;

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


        "<tr class='rr'> <td class='tt'><input type='text' class='form-control' readonly='readonly' size='1' value='" + opcionSeleccionada.id + "' id='id" + aa + "' name= 'id" + aa +
        "'></td> <td class='tt'> <input type='text' class='form-control' readonly='readonly'  value='" + opcionSeleccionada.text + "' id='txt" + aa + "' name= 'txt" + aa + 
        "'></td>  <td class='tt'><input type='text' class='form-control' size='2' value='" + cant.value + "' id='cant" + aa + "' name= 'cant" + aa +  
         "'</td>  <td class='tt'><input type='text' class='form-control' size='2' value='" + opcionSeleccionada.value + "' id='pu" + aa + "' name= 'pu" + aa +  
         "'</td>  <td class='tt'><input type='text' class='form-control' readonly='readonly' size='2' value='" + total + "' id='tt" + aa + "' name= 'tt" + aa +
         "' </td>  <td class='tt'><input type='text' class='form-control' readonly='readonly'  value='" + final.value + "' id='est" + aa + "' name= 'est" + aa +
        "'</td>  </tr>"
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


