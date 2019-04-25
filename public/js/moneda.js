function agregar_moneda () {
    

var codigo = $("#codigo").val();
var nombre = $("#nombre").val();
var descripcion = $("#descripcion").val();
var estado = $("#estado").val();

 $.ajax({
     type: "post",
     url: "Moneda/addmoneda",
     data: {
       codigo : codigo,
       nombre : nombre,
       descripcion : descripcion,
       estado : estado
     },  
     success: function (response) {
         //console.log(response);
         switch (JSON.parse(response)) {
               
            case 1:
                alert ("Se agrego correctamente");               
                    window.location.href='Moneda';                  
              break; 
            default: 
             alert("ERROR EN EL SISTEMA");
          }
     }
 });

  }

function eliminar_moneda(cod) {
    $.ajax({
        type: "post",
        url: "Moneda/delmoneda",
        data: {
            cod : cod
        },
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {               
                case 1:
                    alert ("Se eliminó correctamente");               
                        window.location.href='Moneda';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}

function editar_moneda(codigo,nombre,descripcion,estado) {

    $("#ucodigo").val(codigo);
    $("#unombre").val(nombre);
    $("#udescripcion").val(descripcion);
    $("#uestado").val(estado);
    
}

function updatemoneda() {

    var ucodigo = $("#ucodigo").val();
    var unombre = $("#unombre").val();
    var udescripcion = $("#udescripcion").val();
    var uestado = $("#uestado").val();
    $.ajax({
        type: "post",
        url: "Moneda/updmoneda",
        data: {
            ucodigo : ucodigo,
            unombre : unombre,
            udescripcion : udescripcion,
            uestado : uestado
        },  
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {
               
                case 1:
                    alert ("Se actualizó correctamente");                   
                        window.location.href='Moneda';                     
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}