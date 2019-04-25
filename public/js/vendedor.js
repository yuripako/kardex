function eliminar_vendedor(cod) {
    $.ajax({
        type: "post",
        url: "Vendedor/delvendedor",
        data: {
            cod : cod
        },
        success: function (response) {
            //console.log(response);
            switch (JSON.parse(response)) {               
                case 1:
                    alert ("Se eliminó correctamente");               
                        window.location.href='Vendedor';                  
                  break; 
                default: 
                 alert("ERROR EN EL SISTEMA");
              }
        }
    });
}