

function cargar_sumodulo(idrol) {
    $.ajax({
        type: "post",
        url: "Permenu/load_permiso_rol",
        data: {
            idrol:idrol
        },
        success: function (response) {
           // console.log(response);
            $(".lista").html(response);
        }
    });
}

function permiso_mo() {
    alert("hola mundo");
}