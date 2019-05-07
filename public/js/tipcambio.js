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
          $("#umonedatc2").html(response);
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
            $("#monendabasload").html(response);
		  /* $("#monedabas").val(response); */
		  $("#umoneda").html(response);
		}
	});
}

function isNumberKey(evt)
    {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 
        && (charCode < 48 || charCode > 57))
        return false;
        return true;
    }  
            
function agregar_tipcambio () {        
    var monetc = $("#monedatc").val();
    var monebas = $("#monedabas").val();
    var fechacam = $("#fechacam").val();
    var valortc = $("#valortc").val();        
     $.ajax({
         type: "post",
         url: "Tipcambio/addtipcambio",
         data: {           
            fechacam : fechacam,
            monetc : monetc,           
            monebas : monebas,   
            valortc : valortc                      
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Tipcambio';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_tipcambio(moneda_cod_mone,fecha_cam,monbas,tipocambio) {
    $("#umonedatc2").val(moneda_cod_mone);     
    $("#umonedabas").val(monbas);
    $("#ufechacam").val(fecha_cam);    
    $("#uvalortc").val(tipocambio);      
}

function updatetipcambio() {
    var monedabas = $("#umonedabas").val();
    var monedatc = $("#umonedatc2").val();
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