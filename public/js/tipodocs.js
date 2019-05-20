         
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

function actualizar_tipodocs(cod_doc,nom_doc,tip_doc,tip_mov,estado) {
    $("#utipodoc").val(cod_doc);     
    $("#udescripciondoc").val(nom_doc);     
    $("#ucodigodoc").val(tip_doc);
    $("#utipomovdoc").val(tip_mov);    
    $("#uestadodoc").val(estado);      
}

function updatetipodocs() {
    var valor01 = $("#utipodoc").val();
    var valor02 = $("#udescripciondoc").val();
    var valor03 = $("#ucodigodoc").val();
    var valor04 = $("#utipomovdoc").val();    
    var valor05 = $("#uestadodoc").val();    
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