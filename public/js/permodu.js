$(document).ready(function() {
 
});


function userxmodulo(){

    $.ajax({
        type: "post",
        url: "Permodu/usuario_modulos",
        data: {},
        success: function (response) {
           $("#agenda").html(response);
            
        }
    });

  }



function cargar_sumodulo(idrol) {
    $.ajax({
        type: "post",
        url: "Permodu/load_permiso_rol",
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
        url: "Permodu/darlepermiso",
        data: {
            estado : estado,
            id:id
        },
        success: function(response) {
            alert(response);
            window.location.href="Permodu";
        }
    });
}

function denegar(estado,id) {
    $.ajax({
        type: "post",
        url: "Permodu/denegarpermiso",
        data: {
            estado : estado,
            id:id
        },
        success: function(response) {
            alert(response);
            window.location.href="Permodu";
        }
    });
}