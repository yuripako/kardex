$(document).ready(function () {
	cargocategoria();
	cargounidades();
	cargomoneda();
});

function cargocategoria() {
	$.ajax({
		type: "post",
		url: "Articulo/cargo_categorias",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#categoria").html(response);
		}
	});
}

function cargounidades() {
	$.ajax({
		type: "post",
		url: "Articulo/cargo_unidades",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#unidad").html(response);
		}
	});
}

function cargomoneda() {
	$.ajax({
		type: "post",
		url: "Articulo/cargo_monedas",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#moneda").html(response);
		}
	});
}

function agregar_producto() {

	var codigo	 	= $("#codigo").val();
	var nombre 		= $("#nombre").val();
	var moneda		= $("#moneda").val();
	var categoria	= $("#categoria").val();
	var estado		= $("#estado").val();
	var unidad		= $("#unidad").val();
	var lote		= $("#lote").val();
	var bien		= $("#bien").val();
	var impuesto    = $("#impuesto").val();
	var descripcion = $("#descripcion").val();
   
	if (codigo=="" || nombre=="" || moneda=="" || categoria=="" ||estado=="" || unidad=="" || lote=="" || bien=="" || impuesto=="" ||descripcion=="") {
	   alert("Todo los campos son obligatorios!!!");	
	}else{

	$.ajax({
		type: "post",
		url: "Articulo/verificar_codigo",
		data: {
			codigo :codigo ,
			nombre:nombre,
			moneda:moneda,
			categoria:categoria,
			estado:estado,
			unidad:unidad,
			lote:lote,
			bien:bien,
			impuesto:impuesto,
			descripcion:descripcion
		},
		success: function (response) {
			//console.log(JSON.parse(response));
			
			
			switch (JSON.parse(response)) {
				case 1:
				//alert ("inserto"); 
				agregar_productos_validado(codigo,nombre,moneda,categoria,estado,unidad,lote,bien
					,impuesto,descripcion) ;          
				           
			  break; 
				case 2:
					alert ("El codigo ya existe, digite otro!");               
					                 
				  break; 
				default: 
				 alert("ERROR EN EL SISTEMA");
			  }
		}
	});

				
	}

}

function agregar_productos_validado(codigo,nombre,moneda,categoria,estado,unidad,lote,bien
	,impuesto,descripcion)  {
	$.ajax({
		type: "post",
		url: "Articulo/insertar_productos",
		data: {
			codigo :codigo ,
			nombre:nombre,
			moneda:moneda,
			categoria:categoria,
			estado:estado,
			unidad:unidad,
			lote:lote,
			bien:bien,
			impuesto:impuesto,
			descripcion:descripcion
		},
		success: function (response) {
			switch (JSON.parse(response)) {
				case 11:
			        alert("se inserto correctamente!");
				window.location.href="Articulo";             
			  break; 
				default: 
				 alert("ERROR EN EL SISTEMA");
			  }
	
		}
	});
}

function eliminar_producto(id) {

	$.ajax({
		type: "post",
		url: "Articulo/eliminar_productos",
		data: {
			id : id
		},
		success: function (response) {
		//console.log(JSON.parse(response));
		switch (JSON.parse(response)) {
			case 1:
			alert ("no se puede eliminar este productos porque se encuentra en uso!"); 
			  break; 
			case 2:
				alert ("se elimino correctamente!");
				window.location.href="Articulo";   
			  break; 
			default: 
			 alert("ERROR EN EL SISTEMA");
		  }
		
		}
	});
  }