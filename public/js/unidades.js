$( document ).ready(function() {
    $("#error_u").hide();
    $("#correcto_u").hide();
    $("#borradouni_u").hide();
});


function agregar_unidad() {

	var codigo      = $("#codigo").val();
	var nombre      = $("#nombre").val();
	var descripcion = $("#descripcion").val();

	$.ajax({
		url: "Unidades/add_unidad",
		type: "post",
		data: {
		  codigo      : codigo,
		  nombre      : nombre,
          descripcion : descripcion
		},
		success: function (datos) {

			//console.log(datos);
 
		    switch (JSON.parse(datos)) {
               
                  case 1:
                   $("#error_u").show();
                     window.setTimeout(function(){ 
						    $("#error_u").hide();
						} ,3000);
                    break; 
                  case 2:
                    $("#correcto_u").show();
                    window.setTimeout(function(){ 
					   window.location.href='Unidades';
					} ,3000);
                    
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
           
		}
	});

}

function delete_uni(id) {

	var id = id;
    	$.ajax({
		url: "Unidades/eliminar_unidad",
		type: "post",
		data: {
		  id   : id
		},
		success: function (datos) {
			//console.log(datos);
		    switch (JSON.parse(datos)) {
               
                  case 1:
                   $("#borradouni_u").show();
                     window.setTimeout(function(){ 
						  window.location.href='Unidades';
						} ,2500);
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
           
		}
	});
}


function editar_unid(codigo,nombre , descripcion) {

	$("#codigo3").val(codigo);
	$("#nombre3").val(nombre);
	$("#descripcion3").val(descripcion);

}

function edit_unidades() {

    var codigo3      = $("#codigo3").val();
	var nombre3      = $("#nombre3").val();
	var descripcion3 = $("#descripcion3").val();
	  	$.ajax({
		url: "Unidades/editado_unidades",
		type: "post",
		data: {
		  codigo3      : codigo3,
		  nombre3      : nombre3,
		  descripcion3 : descripcion3
		},
		success: function (datos) {
			//console.log(datos);
		    switch (JSON.parse(datos)) {
               
                  case 1:
                   $("#editado").show();
                     window.setTimeout(function(){ 
						  window.location.href='Unidades';
						} ,2500);
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
           
		}
	});

}