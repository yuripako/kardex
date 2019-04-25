function login() {

 var user = $("#user").val();
 var pass = $("#pass").val();
 
	$.ajax({
		url: "Login/validar_entrada",
		type: "post",
		data: {
			user : user,
			pass : pass
		},
		success: function (datos) {

		    switch (JSON.parse(datos)) {
                  case 1:
                    alert("No se permite valores vacios");
                    break; 
                  case 2:
                    alert("No existe tal usuario en el sistema");
                    break; 
                  case 3:
                    alert("Datos correctos  ");
                    window.location.href='Inicio';
                    break; 
                  default: 
                   alert("ERROR EN EL SISTEMA");
                }
		}
	});

}