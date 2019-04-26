function agregar_vendedor () {    
    var nombre = $("#nombre_ven").val();
    var apellido = $("#apellido_ven").val();
    var nrodocumento = $("#documento_ven").val();
    var telefono = $("#telefono_ven").val();
    var correo = $("#correo_ven").val();
    var zona = $("#zona_ven").val();
    var region = $("#region_ven").val();
    var estado = $("#estado_ven").val();
    
     $.ajax({
         type: "post",
         url: "Vendedor/addvendedor",
         data: {           
           nombre : nombre,
           apellido : apellido,
           nrodocumento : nrodocumento,
           telefono : telefono,
           correo : correo,
           zona : zona,
           region : region,
           estado : estado
         },  
         success: function (response) {
             //console.log(response);
             switch (JSON.parse(response)) {
                   
                case 1:
                    alert ("Se agrego correctamente");               
                        window.location.href='Vendedor';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
         }
     });
    
}

function eliminar_vendedor(cod) {
    $.ajax({
        type: "post",
        url: "Vendedor/delvendedor",
        data: {
            cod : cod
        },
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {               
                case 1:
                    alert ("Se eliminó correctamente");               
                        window.location.href='Vendedor';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}
function actualizar_vendedor(idvendedor,nombre,apellido,dni_nif,telefono,correo,zona,region,estado) {
    $("#uidevendedor").val(idvendedor);    
    $("#unombre").val(nombre);
    $("#uapellido").val(apellido);
    $("#udocumento").val(dni_nif);
    $("#utelefono").val(telefono);
    $("#ucorreo").val(correo);
    $("#uzona").val(zona);
    $("#uregion").val(region);
    $("#uestado").val(estado);
    
}

function updatevendedor() {
    var uidevendedor = $("#uidevendedor").val();
    var unombre = $("#unombre").val();
    var uapellido = $("#uapellido").val();
    var udocumento = $("#udocumento").val();
    var utelefono = $("#utelefono").val();
    var ucorreo = $("#ucorreo").val();
    var uzona = $("#uzona").val();
    var uregion = $("#uregion").val();
    var uestado = $("#uestado").val();

    $.ajax({
        type: "post",
        url: "Vendedor/updvendedor",
        data: {
            uidevendedor : uidevendedor,
            unombre : unombre,
            uapellido : uapellido,
            udocumento : udocumento,
            utelefono : utelefono,
            ucorreo : ucorreo,
            uzona : uzona,
            uregion : uregion,
            uestado : uestado
        },  
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {
               
                case 1:
                    alert ("Se actualizó correctamente");                   
                        window.location.href='Vendedor';                     
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}
