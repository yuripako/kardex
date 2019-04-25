$( document ).ready(function() {
    $("#error").hide();
    $("#correcto").hide();
    $("#borradocat").hide();
    $("#editado").hide();
	 
	
});

 function load_categoria() {

	 $.ajax({
		 type: "post",
		 url: "Categorias/loadcategorias",
		 data: {},
		 success: function (response) {
			 console.log(response);
			
		 }
	 });

 }

function agregar_categoria() {
	var categoria   = $("#categoria").val();
	var descripcion = $("#descripcion").val();

	$.ajax({
		url: "Categorias/add_categoria",
		type: "post",
		data: {
		  categoria   : categoria,
          descripcion : descripcion
		},
		success: function (datos) {

			//console.log(datos);
 
		    switch (JSON.parse(datos)) {
               
                  case 1:
                   $("#error").show();
                     window.setTimeout(function(){ 
						    $("#error").hide();
						} ,3000);
                    break; 
                  case 2:
                    $("#correcto").show();
                    window.setTimeout(function(){ 
					   window.location.href='Categorias';
					} ,3000);
                    
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
           
		}
	});

}

function eliminar_cat(id) {
	var id = id;
    	$.ajax({
		url: "Categorias/eliminar_categoria",
		type: "post",
		data: {
		  id   : id
		},
		success: function (datos) {
		//	console.log(JSON.parse(datos));
			
				switch (JSON.parse(datos))
				 {
					case 0 :
					alert("La categoria esta ligada a un producto, NO SE PODRA BORRAR!!!");
					break;
					 case 1:
					 //alert("se borrara");
					 eliminar_Cat2(id);
					 break;
					 /*
                   $("#borradocat").show();
                     window.setTimeout(function(){ 
						  window.location.href='Categorias';
						} ,2500);
  							 break; 
	            */						 
                  default: 
                   alert("ERROR EN EL SISTEMA");
            }
           
		}
	});

}

function eliminar_Cat2(id) {
	$.ajax({
		type: "post",
		url: "Categorias/eliminar_categoria2",
		data: { 
			id : id
		},
		success: function (response) {
			if (JSON.parse(response)==11) {
				$("#borradocat").show();
				window.setTimeout(function(){ 
        window.location.href='Categorias';
        } ,2500);
			}
		}
	});
}

//--------------------------

function editar_cat(id,categoria , descripcion) {

	$("#ide").val(id);
	$("#categoria2").val(categoria);
	$("#descripcion2").val(descripcion);

}
function edit_categoria() {

   	var ide          = $("#ide").val();
	var categoria2   = $("#categoria2").val();
	var descripcion2 = $("#descripcion2").val();
	  	$.ajax({
		url: "Categorias/editado_categoria",
		type: "post",
		data: {
		  ide          : ide,
		  categoria2   : categoria2,
		  descripcion2 : descripcion2
		},
		success: function (datos) {
			//console.log(datos);
		    switch (JSON.parse(datos)) {
               
                  case 1:
                   $("#editado").show();
                     window.setTimeout(function(){ 
						  window.location.href='Categorias';
						} ,2500);
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
           
		}
	});
}