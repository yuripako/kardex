function agregar_unmedida () {    
    var codigo = $("#codigound").val();
    var nombre = $("#nombreund").val();
    var codigoubl = $("#codigoubl").val();
    var descripcion = $("#descripcionund").val();    
    var estado = $("#estadound").val();
    
     $.ajax({
         type: "post",
         url: "Unmedida/addunmedida",
         data: {           
           codigo : codigo,
           nombre : nombre,
           codigoubl : codigoubl,
           descripcion : descripcion,           
           estado : estado
         },  
         success: function (response) {
             //console.log(response);
             switch (JSON.parse(response)) {
                   
                case 1:
                    alert ("Se agrego correctamente");               
                        window.location.href='Unmedida';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
         }
     });
    
}

function actualizar_unmedida(cod_unid,nom_unid,cod_ubl,descripcion,estado) {
    $("#codigound").val(cod_unid);    
    $("#nombreund").val(nom_unid);
    $("#codigoubl").val(cod_ubl);
    $("#descipcionund").val(descripcion);  
    $("#estadound").val(estado);
    
}

function updatemedida() {
    var codigo = $("#codigound").val();
    var nombre = $("#nombreund").val();
    var codigoubl = $("#codigoubl").val();
    var descripcion = $("#descripcionund").val();    
    var estado = $("#estadound").val();

    $.ajax({
        type: "post",
        url: "Unmedida/updmedida",
        data: {
            codigo : codigo,
            nombre : nombre,
            codigoubl : codigoubl,
            descripcion : descripcion,            
            estado : estado
        },  
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {
               
                case 1:
                    alert ("Se actualizó correctamente");                   
                        window.location.href='Unmedida';                     
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}


function eliminar_unmedida(cod) {
    $.ajax({
        type: "post",
        url: "Unmedida/delunmedida",
        data: {
            cod : cod
        },
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {               
                case 1:
                    alert ("Se eliminó correctamente");               
                        window.location.href='Unmedida';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}