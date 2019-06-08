$(document).ready(function() {
    loadselec_usuario();
    loadselec_modulo();
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


// para la opcion de agregar permiso
function loadselec_usuario(){  
$.ajax({
    type: "post",
    url: "Permodu/select_usuarios",
    data: {},
    success: function (response) {
        $("#moduser").html(response);
    }
});

}

function loadselec_modulo(){  
    $.ajax({
        type: "post",
        url: "Permodu/select_modulos",
        data: {},
        success: function (response) {
            $("#modmodulo").html(response);
        }
    });
    
    }


    function addmodulos() {
        var form = $("#form_permodulo").serialize();
        $.ajax({
            type: "post",
            url: "Permodu/permitir_acceso",
            data: form,
            success: function (response) {
                alert(response);
                window.location.href="Permodu";
            }
        });
      }