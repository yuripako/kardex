function agregar_conpago () {    
    var codigo = $("#codigound").val();
    var nombre = $("#nombreund").val();
    var indori = $("#indori").val();    
    var estado = $("#estadound").val();
     $.ajax({
         type: "post",
         url: "Conpago/addconpago",
         data: {           
            codigo : codigo,
            nombre : nombre,           
            indori : indori,            
            estado : estado
         },  
         success: function (response) {
             //console.log(response);
             switch (JSON.parse(response)) {
                   
                case 1:
                    alert ("Se agrego correctamente");               
                        window.location.href='Conpago';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
         }
     });
    
}

function actualizar_conpago(id_cond,nom_cond,cod_cond,ind_ori,estado) {
    $("#ucodigound").val(nom_cond);    
    $("#unombreund").val(cod_cond);
    $("#uindori").val(ind_ori);    
    $("#uestadound").val(estado);
    $("#uidconpago").val(id_cond);    
}

function updateconpago() {
    var codigo = $("#ucodigound").val();
    var nombre = $("#unombreund").val();
    var indori = $("#uindori").val();    
    var estado = $("#uestadound").val();
    var id_cond = $("#uidconpago").val();

    $.ajax({
        type: "post",
        url: "Conpago/updconpago",
        data: {
            codigo : codigo,
            nombre : nombre,
            indori : indori,                   
            estado : estado,
            id_cond : id_cond
        },  
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {
               
                case 1:
                    alert ("Se actualizó correctamente");                   
                        window.location.href='Conpago';                     
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}


function eliminar_conpago(cod) {
    $.ajax({
        type: "post",
        url: "Conpago/delconpago",
        data: {
            cod : cod
        },
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {               
                case 1:
                    alert ("Se eliminó correctamente");               
                        window.location.href='Conpago';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}