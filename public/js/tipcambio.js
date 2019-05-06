$(document).ready(function () {	
	cargomoneda();
});
function cargomoneda() {
	$.ajax({
		type: "post",
		url: "Articulo/cargo_monedas",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#moneda").html(response);
		  $("#umoneda").html(response);
		}
	});
}

function agregar_tipcambio () {    
    var codigo = $("#codigound").val();
    var nombre = $("#nombreund").val();
    var indori = $("#indori").val();    
    var estado = $("#estadound").val();
     $.ajax({
         type: "post",
         url: "Conpago/addtipcambio",
         data: {           
            codigo : codigo,
            nombre : nombre,           
            indori : indori,            
            estado : estado
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Conpago';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_tipcambio(id_cond,nom_cond,cod_cond,ind_ori,estado) {
    $("#ucodigound").val(nom_cond);    
    $("#unombreund").val(cod_cond);
    $("#uindori").val(ind_ori);    
    $("#uestadound").val(estado);
    $("#uidtipcambio").val(id_cond);    
}

function updatetipcambio() {
    var codigo = $("#ucodigound").val();
    var nombre = $("#unombreund").val();
    var indori = $("#uindori").val();    
    var estado = $("#uestadound").val();
    var id_cond = $("#uidtipcambio").val();

    $.ajax({
        type: "post",
        url: "Conpago/updtipcambio",
        data: {
            codigo : codigo,
            nombre : nombre,
            indori : indori,                   
            estado : estado,
            id_cond : id_cond
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Conpago';  
        }
    });
}


function eliminar_tipcambio(cod) {
    $.ajax({
        type: "post",
        url: "Conpago/deltipcambio",
        data: {
            cod : cod
        },
        success: function (response) {
            alert (response) ;
            window.location.href='Conpago';              
        }
    });
}