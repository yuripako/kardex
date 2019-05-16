         
function agregar_tipodocs () {        
    var valor01 = $("#tipodoc").val();
    var valor02 = $("#descripciondoc").val();
    var valor03 = $("#codigodoc").val();
    var valor04 = $("#tipomovdoc").val();        
    var valor05 = $("#estadodoc").val();        
     $.ajax({
         type: "post",
         url: "Tipodocs/addtipodocs",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04                      
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Tipodocs';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_tipodocs(cod_doc,nom_doc,prefijo_doc,tipomov,estado) {
    $("#utipodoc").val(prefijo_doc);     
    $("#udescripciondoc").val(nom_doc);     
    $("#ucodigodoc").val(cod_doc);
    $("#utipomovdoc").val(tipomov);    
    $("#uestadodoc").val(estado);      
}

function updatetipodocs() {
    var valor01 = $("#ucodtipodocs").val();
    var valor02 = $("#udetallemov").val();
    var valor03 = $("#utipodocs").val();
    var valor04 = $("#uprefijomov").val();    
    var valor05 = $("#uestadomov").val();    
    $.ajax({
        type: "post",
        url: "Tipodocs/updtipodocs",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
            valor05 : valor05         
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Tipodocs';  
        }
    });
}

function eliminar_tipodocs(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Tipodocs/deltipodocs",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Tipodocs';              
            }
        });
    } else {
        window.location.href='Tipodocs';   
    }    
}