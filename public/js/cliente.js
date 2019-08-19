$(document).ready(function () {	
    cargotipodocid();       
    busqueda();    
});

// busquedaaaaaaaaaaaaaaaaaaaaaa

function busqueda() { 

  var tipo = $("#tipodoc").val();
  $.ajax({
      type: "post",
	  url: "Cliente/bus_tipo",
      data: {
      tipo:   tipo
        },
      success: function (response) {      
        $("#data").html(response);        
      }
  });
  
 }


function llenarcasilladoc(codigo,nomdoc,nomcor,docs) {
    $("#tipdoc").val(codigo);
    $("#tipdocid").val(nomcor);
    $("#tipodoc").val(nomdoc);
    $("#invi").hide();    
  }

  //##########################33
function buscadistri() {     
    var valor = $("#disemp").val();           
    var desc = "distri";
    $.ajax({
        type: "post",
        url: "Cliente/bus_distrito",
        data: {
        valor: valor,
        desc: desc    
        },
        success: function (response) {        
            $("#datadis").html(response);        
        }
    });
    
}
function buscaprovi() {     
    var valor = $("#proemp").val();    
    var desc = "provi";       
    $.ajax({
        type: "post",
        url: "Cliente/bus_distrito",
        data: {
        valor: valor,
        desc: desc
        },
        success: function (response) {        
            $("#datadis").html(response);        
        }
    });
    
}
function buscadepa() {     
    var valor = $("#depemp").val();   
    var desc = "depa";
    $.ajax({
        type: "post",
        url: "Cliente/bus_distrito",
        data: {
        valor: valor,
        desc: desc
        },
        success: function (response) {        
            $("#datadis").html(response);        
        }
    });
    
}

function llenarubigeo(ubigeo, distri,provincia, depart) {
    $("#ubiemp").val(ubigeo);
    $("#disemp").val(distri);
    $("#proemp").val(provincia);
    $("#depemp").val(depart);    
    $("#invidis").hide();    
    }
 

// fin de busqyueda
function cargotipodocid() {
	$.ajax({
		type: "post",
		url: "Cliente/cargo_tipodocid",
		data: {},
		success: function (response) {
			//console.log(response);
          $("#tipdoc").html(response);
          //$("#tipdocid").html(response);
        //    $("#utiposerdoc").html(response);		  
       
        
		}
	});
}


function agregar_cliente() {        
    var valor01 = null;
    var valor02 = $("#nomemp").val();
    var valor03 = $("#numdoc").val();
    var valor04 = $("#tipdoc").val();
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
         url: "Cliente/addcliente",
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
            window.location.href='Cliente';  
            // console.log(response);
             
         }
     });
    
}
