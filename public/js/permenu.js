$(document).ready(function() {
 
});


function userxmodulo(){

    $.ajax({
        type: "post",
        url: "Permenu/usuario_modulos",
        data: {},
        success: function (response) {
           $("#agenda").html(response);
            
        }
    });

  }



function cargar_sumodulo(idrol) {
    $.ajax({
        type: "post",
        url: "Permenu/load_permiso_rol",
        data: {
            idrol:idrol
        },
        success: function(response) {
           // console.log(response);
            $(".lista").html(response);
        }
    });
}

function darpermenu() {
    alert("hola mundo");
}



function permitir(estado,id) {
   
    
    $.ajax({
        type: "post",
        url: "Permenu/darlepermiso",
        data: {
            estado : estado,
            id:id
        },
        success: function(response) {
            alert(response);
            window.location.href="Permenu";
        }
    });
}

function denegar(estado,id) {
    $.ajax({
        type: "post",
        url: "Permenu/denegarpermiso",
        data: {
            estado : estado,
            id:id
        },
        success: function(response) {
            alert(response);
            window.location.href="Permenu";
        }
    });
}