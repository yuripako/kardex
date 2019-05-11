         
function agregar_tipomov () {        
    var detallemov = $("#detallemov").val();
    var tipomov = $("#tipomov").val();
    var prefijomov = $("#prefijomov").val();
    var estadomov = $("#estadomov").val();        
     $.ajax({
         type: "post",
         url: "Tipomov/addtipomov",
         data: {           
            detallemov : detallemov,
            tipomov : tipomov,           
            prefijomov : prefijomov,   
            estadomov : estadomov                      
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Tipomov';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_tipomov(cod_tipomov,detalle,tipo,cod_sut,estado) {
    $("#ucodtipomov").val(cod_tipomov);     
    $("#udetallemov").val(detalle);     
    $("#utipomov").val(tipo);
    $("#uprefijomov").val(cod_sut);    
    $("#uestadomov").val(estado);      
}

function updatetipomov() {
    var ucodtipomov = $("#ucodtipomov").val();
    var udetallemov = $("#udetallemov").val();
    var utipomov = $("#utipomov").val();
    var uprefijomov = $("#uprefijomov").val();    
    var uestadomov = $("#uestadomov").val();    
    $.ajax({
        type: "post",
        url: "Tipomov/updtipomov",
        data: {
            ucodtipomov : ucodtipomov,
            udetallemov : udetallemov,
            utipomov : utipomov,                   
            uprefijomov : uprefijomov,
            uestadomov : uestadomov         
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Tipomov';  
        }
    });
}

function eliminar_tipomov(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Tipomov/deltipomov",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Tipomov';              
            }
        });
    } else {
        window.location.href='Tipomov';   
    }    
}