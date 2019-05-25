$( document ).ready(function() {

	loadjerarquia();
});

 
function loadjerarquia() {
	$.ajax({
		type: "post",
		url: "Categorias/load_jerarquias",
		data: {},
		success: function (response) {
			console.log(response);
			$("#jerarquia1").html(response);
		}
	});
}