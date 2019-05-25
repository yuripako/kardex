$(document).ready(function () {
	cargocategoria();
	cargounidades();
	cargomoneda_art();
});

function cargocategoria() {
	$.ajax({
		type: "post",
		url: "Articulo/cargo_categorias",
		data: {},
		success: function (response) {
			//console.log(response);
		  $("#categoria").html(response);
		  $("#ucategoria").html(response);
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
		  $("#uunidad").html(response);
		}
	});
}

function cargomoneda_art() {
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
		 	alert(response);
			window.location.href="Articulo";   
	
		}
	});
  }


  function editar_producto(id,codigo,nombre,moneda,categoria,estado,unidad,lote,bien,impuesto,descripcion)
	 {

		$("#uid").val(id);
		$("#ucodigo").val(codigo);
	    $("#unombre").val(nombre);
		$("#umoneda").val(moneda);
		$("#ucategoria").val(categoria);
		$("#uestado").val(estado);
		$("#uunidad").val(unidad);
	    $("#ulote").val(lote);
		$("#ubien").val(bien);
		$("#uimpuesto").val(impuesto);
	    $("#udescripcion").val(descripcion);
	
  }

  function update_producto() {
		var form = $("#edit").serialize();
		
		$.ajax({
			type: "post",
			url: "Articulo/actualizar_productos",
			data: form,
			success: function (response) {
				switch (JSON.parse(response)) {
					case 1:
								alert("se actualizo correctamente!");
					window.location.href="Articulo";             
					break; 
					default: 
					 alert("ERROR EN EL SISTEMA");
					}
			}
		});
		
	}

	function mamey(params) {
		console.log("message ");
	}
