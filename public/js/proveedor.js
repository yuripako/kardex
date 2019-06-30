$(document).ready(function () {	
    cargotipodocid();    
   
});


function cargotipodocid() {
	$.ajax({
		type: "post",
		url: "Proveedor/cargo_tipodocid",
		data: {},
		success: function (response) {
			//console.log(response);
          $("#tipdoc").html(response);
          //$("#tipdocid").html(response);
        //    $("#utiposerdoc").html(response);		  
        console.log(response);
        
		}
	});
}


function agregar_proveedor() {        
    var valor01 = null;
    var valor02 = $("#nomemp").val();
    var valor03 = $("#numdoc").val();
    var valor04 = $("#tipdocid").val();
    var valor05 = $("#diremp").val();        
    var valor06 = $("#depemp").val();        
    var valor07 = $("#proemp").val();        
    var valor08 = $("#disemp").val();            
    var valor09 = $("#ubiemp").val();        
    var valor10 = $("#telemp").val();        
    var valor11 = $("#celemp").val();        
    var valor12 = $("#coremp").val();        
    var valor13 = $("#nomcon").val();        
    var valor14 = $("#celcon").val();        
    var valor15 = $("#nomcon2").val();        
    var valor16 = $("#celcon2").val();        
    var valor17 = $("#notemp").val();             
     $.ajax({
         type: "post",
         url: "Serieynum/addserieynum",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04,                      
            valor05 : valor05,
            valor06 : valor06,
            valor07 : valor07,
            valor08 : valor08,
            valor09 : valor09,
            valor10 : valor10,
            valor11 : valor11,
            valor12 : valor12,
            valor13 : valor13,
            valor14 : valor14,
            valor15 : valor15,
            valor16 : valor16,
            valor17 : valor17
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Proveedor';  
            console.log(response);
             
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