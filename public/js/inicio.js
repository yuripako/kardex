function salir() {
	
	$.ajax({
		url: "Login/salir_sistema",
		type: "post",
		data: {
		},
		success: function (datos) {
             
		    switch (JSON.parse(datos)) {
               
                  case 1:
                    window.location.href='Login';
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
		}
	});


}


function menu(idpermiso) {

//	alert(idpermiso);
$.ajax({
	type: "post",
	url: "Inicio/loadmenu",
	data: {
		idpermiso : idpermiso
	},
	success: function (response) {
	 // console.log(response);
		$(".pe").html(response);
  
	}
});

}

function loadsubmenu(idsubmen) {
 console.log(idsubmen);
 
}