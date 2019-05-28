$( document ).ready(function() {

	loadjerarquia();
});

 
function loadjerarquia() {
	$.ajax({
		type: "post",
		url: "Categorias/load_jerarquias",
		data: {},
		success: function (response) {
			//console.log(response);
			$("#jerarquia1").html(response);
		}
	});
}

function agregar_categoria() {
	var form = $("#form_jerarquia").serialize();

	$.ajax({
		type: "post",
		url: "Categorias/add_categoria",
		data: form,
		
		success: function (response) {
			alert(response);	
		 window.location.href='Categorias';
		}
	});
}