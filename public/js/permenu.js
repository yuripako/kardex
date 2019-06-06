$(document).ready(function() {
    darpermiso();
    loadrolesper();
});


function darpermiso() {
    $.ajax({
        type: "post",
        url: "Permenu/dar_permisomodulo",
        data: {
           
        },
        success: function(response) {
           // console.log(response);
            $("#selecmod").html(response);
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

function loadrolesper(){
    $.ajax({
        type: "post",
        url: "Permenu/load_rolesmenus",
        data: {},
        success: function(response) {
         
           $("#selecrol").html(response);
        }
    });
}

function permitir(estado) {
    var selecmod = $("#selecmod").val();
    var selecrol = $("#selecrol").val();
    
    $.ajax({
        type: "post",
        url: "Permenu/darlepermiso",
        data: {
            selecmod:selecmod,
            selecrol:selecrol,
            estado : estado
        },
        success: function(response) {
            alert(response);
        }
    });
}

function denegar(estado) {
    var selecmod = $("#selecmod").val();
    var selecrol = $("#selecrol").val();
    
    $.ajax({
        type: "post",
        url: "Permenu/denegarpermiso",
        data: {
            selecmod:selecmod,
            selecrol:selecrol,
            estado : estado
        },
        success: function(response) {
            alert(response);
        }
    });
}