$(document).ready(function () {	
    cargomoneda();
    cargomonedabase();
});
function cargomoneda() {
	$.ajax({
		type: "post",
		url: "Tipcambio/cargo_monedas",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#monedatc").html(response);
		  $("#umoneda").html(response);
		}
	});
}
function cargomonedabase() {
	$.ajax({
		type: "post",
		url: "Tipcambio/cargo_monebas",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#monedabas").html(response);
		  $("#umoneda").html(response);
		}
	});
}

function agregar_tipcambio () {        
    var monetc = $("#monedatc").val();
    var monebas = $("#monebas").val();
    var fechacam = $("#fechacam").val();
    var valortc = $("#valortc").val();        
     $.ajax({
         type: "post",
         url: "Tipcambio/addtipcambio",
         data: {           
            fechacam : fechacam,
            monetc : monetc,           
            monebas : monebas,   
            valortc : valortc,                        
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Tipcambio';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_tipcambio(moneda_cod_mone,fecha_cam,monbas,tipocambio) {
    $("#monedatc").val(moneda_cod_mone);    
    $("#umonedabas").val(monbas);
    $("#ufechacam").val(fecha_cam);    
    $("#uvalortc").val(tipocambio);      
}

function updatetipcambio() {
    var monedabas = $("#umonedabas").val();
    var monedatc = $("#monedatc").val();
    var fechacam = $("#ufechacam").val();    
    var valortc = $("#uvalortc").val();    
    $.ajax({
        type: "post",
        url: "Tipcambio/updtipcambio",
        data: {
            monedabas : monedabas,
            monedatc : monedatc,
            fechacam : fechacam,                   
            valortc : valortc            
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Tipcambio';  
        }
    });
}


function eliminar_tipcambio(cod,fecha) {
    $.ajax({
        type: "post",
        url: "Tipcambio/deltipcambio",
        data: {
            cod : cod,
            fecha : fecha
        },
        success: function (response) {
            alert (response) ;
            window.location.href='Tipcambio';              
        }
    });
}