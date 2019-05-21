$(document).ready(function () {	
    cargotipodocs();    
    
});
function cargotipodocs() {
	$.ajax({
		type: "post",
		url: "Serieynum/cargo_tipodocs",
		data: {},
		success: function (response) {
			//console.log(response);
          $("#tiposerdoc").html(response);
          $("#utiposerdoc").html(response);		  
		}
	});
}



function agregar_serieynum() {        
    var valor01 = $("#tiposerdoc").val();
    var valor02 = $("#tiposerdoc").val();
    var valor03 = $("#serieserdoc").val();
    var valor04 = $("#numeracionserdoc").val();
    var valor05 = $("#descripcionserdoc").val();        
         
     $.ajax({
         type: "post",
         url: "Serieynum/addserieynum",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04,                      
            valor05 : valor05
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Serieynum';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_serieynum(id_num,cod_doc,serie,correlativo,descripcion,estado) {
    $("#uidserieynum").val(id_num);     
    $("#utiposerdoc").val(cod_doc);     
    $("#userieserdoc").val(serie);     
    $("#unumeracionserdoc").val(correlativo);
    $("#udescripcionserdoc").val(descripcion);    
    $("#uestadoserdoc").val(estado);      
}

function updateserieynum() {
    var valor01 = $("#uidserieynum").val();
    var valor02 = $("#utiposerdoc").val();
    var valor03 = $("#userieserdoc").val();
    var valor04 = $("#unumeracionserdoc").val();    
    var valor05 = $("#udescripcionserdoc").val();    
    var valor06 = $("#uestadoserdoc").val(); 
    $.ajax({
        type: "post",
        url: "Serieynum/updserieynum",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
            valor05 : valor05,         
            valor06 : valor06    
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Serieynum';  
        }
    });
}

function eliminar_serieynum(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Serieynum/delserieynum",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Serieynum';              
            }
        });
    } else {
        window.location.href='Serieynum';   
    }    
}