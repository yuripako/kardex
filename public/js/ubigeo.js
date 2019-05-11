 
function agregar_ubigeo () {        
    var codubigeo = $("#codubigeo").val();
    var departamento = $("#departamento").val();
    var provincia = $("#provincia").val();
    var distrito = $("#distrito").val();        
     $.ajax({
         type: "post",
         url: "Ubigeo/addubigeo",
         data: {           
            codubigeo : codubigeo,
            departamento : departamento,           
            provincia : provincia,   
            distrito : distrito                      
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Ubigeo';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_ubigeo(codubigeo,departamento,provincia,distrito) {
    $("#ucodubigeo").val(codubigeo);     
    $("#udepartamento").val(departamento);
    $("#uprovincia").val(provincia);    
    $("#udistrito").val(distrito);      
}

function updateubigeo() {
    var codubigeo = $("#ucodubigeo").val();
    var departamento = $("#udepartamento").val();
    var provincia = $("#uprovincia").val();    
    var distrito = $("#udistrito").val();    
    $.ajax({
        type: "post",
        url: "Ubigeo/updubigeo",
        data: {
            codubigeo : codubigeo,
            departamento : departamento,
            provincia : provincia,                   
            distrito : distrito            
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Ubigeo';  
        }
    });
}


function eliminar_ubigeo(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Ubigeo/delubigeo",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Ubigeo';              
            }
        });
    } else {
        window.location.href='Ubigeo';   
    }    
}