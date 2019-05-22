function agregar_almacen() {        
    var valor01 = $("#codalm").val();
    var valor02 = $("#nomalm").val();
    var valor03 = $("#localm").val();
    var valor04 = $("#desalm").val();
    var valor05 = $("#estalm").val();        
         
     $.ajax({
         type: "post",
         url: "Almacen/addalmacen",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04,                      
            valor05 : valor05
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Almacen';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_almacen(cod_alm,nom_alm,localizacion,descripcion,estado) {
    $("#ucodalm").val(cod_alm);     
    $("#unomalm").val(nom_alm);     
    $("#ulocalm").val(localizacion);     
    $("#udesalm").val(descripcion);    
    $("#uestalm").val(estado);      
}

function updatealmacen() {
    var valor01 = $("#ucodalm").val();
    var valor02 = $("#unomalm").val();
    var valor03 = $("#ulocalm").val();
    var valor04 = $("#udesalm").val();    
    var valor05 = $("#uestalm").val();        
    $.ajax({
        type: "post",
        url: "Almacen/updalmacen",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
            valor05 : valor05                    
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Almacen';  
        }
    });
}

function eliminar_almacen(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Almacen/delalmacen",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Almacen';              
            }
        });
    } else {
        window.location.href='Almacen';   
    }    
}