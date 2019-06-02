$(document).ready(function () {
    carga_roles_roll();
    carga_roles_perfill();
});

function usuario(tipo, cod) {
   
 $.ajax({
     type: "post",
     url: "Usuario/insertprobando",
     data: {
         tipo: tipo,
         cod: cod
     },
     success: function (response) {
         //console.log(response);

         if (JSON.parse(response)==1) {
            alert("se ingreso los parametros");
            window.setTimeout(function(){ 
                window.location.href='Usuario';
             } ,1000);
         }
         
     }
 });


}

function carga_roles_roll() {
    $.ajax({
        type: "post",
        url: "Usuario/load_usuario_roles",
        data: {},
        success: function (response) {
           
               $("#inputGroupSelect02").html(response);
        }
    });
}


function carga_roles_perfill() {
    $.ajax({
        type: "post",
        url: "Usuario/load_usuario_perfils",
        data: {},
        success: function (response) {
           
               $("#inputGroupSelect03").html(response);
        }
    });
}


function agregar_usuario() {
	var nombre   = $("#nombre").val();
    var apellido = $("#apellido").val();
    var documento = $("#nrodoc").val();
    var correo = $("#correo").val();
    var usuario = $("#usuario").val();
    var passwd = $("#passwd").val();
    var selrol = $("#inputGroupSelect02").val();
    var selper = $("#inputGroupSelect03").val();
	$.ajax({
		url: "Usuario/add_usuario",
		type: "post",
		data: {
            nombre : nombre,
            apellido : apellido,
            documento : documento,
            correo : correo,
            usuario : usuario,
            passwd : passwd,
            selrol : selrol	,
            selper : selper  
		},
		success: function (response) {
			console.log(response);
		//    alert(response);
        //    window.location.href = "Usuario";
		}
	});

}

function edit_usuario(id_user, username, nombre,apellido,correo,dni,rol) {
    $("#editnombre").val(nombre);
	$("#editapellido").val(apellido);
    $("#editcorreo").val(correo);
    $("#editnrodoc").val(dni);
    $("#editperfil").val(rol);
    //$("#editusuario").val(username);
    document.getElementById("editusuario").innerHTML = username;
}

function editar_usuario() {
    var nombre = $("#editnombre").val();
    var apellido = $("#editapellido").val();    
    var correo = $("#editcorreo").val();
    var documento = $("#editnrodoc").val();
    var selrol = $("#editperfil").val();
    var username = $("#editusuario").val();        
    $.ajax({
     url: "Usuario/editar_usuario",
     type: "post",
     data: {
        nombre : nombre,
        apellido : apellido,
        documento : documento,
        correo : correo,
        username : username,        
        selrol : selrol	
    },
     success: function (datos) {
         //console.log(datos);
         switch (JSON.parse(datos)) {
            
               case 1:
                $("#editado").show();
                  window.setTimeout(function(){ 
                       window.location.href='Usuario';
                     } ,2000);
                 break; 
               default: 
                alert("ERROR EN EL SISTEMA");
             }
        
    }
 });
}