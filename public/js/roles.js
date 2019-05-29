function agregar_rol() {
    var form = $("#form_roles").serialize();
  $.ajax({
      type: "post",
      url: "Roles/addrol",
      data: form,
      
      success: function (response) {
        alert(response);
        window.location.href = "Roles";    
      }
  });
}


function Eliminar_rol(idrol) {
    
    $.ajax({
        type: "post",
        url: "Roles/delete_rol",
        data: {
         idrol : idrol
        },
        success: function (response) {
            //console.log(response);
            
         alert(response);
         window.location.href = "Roles";  
        }
    });
}


function editar_rol(id,rol, estado) {
   $("#ridrol").val(id);
   $("#rrol").val(rol);
   $("#restado").val(estado);
  }

  function update_rol() {
      
 var form =  $("#form_editroles").serialize();

 $.ajax({
     type: "post",
     url: "Roles/update_roles",
     data: form,
     success: function (response) {
        alert(response);
        window.location.href = "Roles";  
     }
 });

  }