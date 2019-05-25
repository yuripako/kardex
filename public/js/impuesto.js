
function agregar_impuesto() {        
    var valor01 = $("#codiva").val();
    var valor02 = $("#nomiva").val();
    var valor03 = $("#poriva").val();
    var valor04 = $("#preiva").val();                   
    $.ajax({
        type: "post",
        url: "Impuesto/addimpuesto",
        data: {           
        valor01 : valor01,
        valor02 : valor02,           
        valor03 : valor03,   
        valor04 : valor04                              
        },  
        success: function (response) {
        alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
        window.location.href='Impuesto';  
        //console.log(response);
            
        }
    });
    
}

function actualizar_impuesto(cod_iva,nom_iva,porc_iva,iva_sut,estado) {
    $("#ucodiva").val(cod_iva);     
    $("#unomiva").val(nom_iva);     
    $("#uporiva").val(porc_iva);     
    $("#upreiva").val(iva_sut);     
    $("#uestadoiva").val(estado);      
}

function updateimpuesto() {
    var valor01 = $("#ucodiva").val();
    var valor02 = $("#unomiva").val();
    var valor03 = $("#uporiva").val();
    var valor04 = $("#upreiva").val();    
    var valor05 = $("#uestadoiva").val();        
    $.ajax({
        type: "post",
        url: "Impuesto/updimpuesto",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
            valor05 : valor05                
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Impuesto';  
        }
    });
}

function eliminar_impuesto(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Impuesto/delimpuesto",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Impuesto';              
            }
        });
    } else {
        window.location.href='Impuesto';   
    }    
}