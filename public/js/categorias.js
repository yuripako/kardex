$( document ).ready(function() {
	loadjerarquia();
	
});

 

function loadinfocat(idcate) {

 $.ajax({
	 type: "post",
	 url: "Categorias/infocate",
	 data: {
		 idcate : idcate	
	 },
	 success: function (response) {
		$(".info").html(response); 
	 }
 });

}



function loadjerarquia() {
	$.ajax({
		type: "post",
		url: "Categorias/load_jerarquias",
		data: {},
		success: function (response) {
			//console.log(response);
			$("#jerarquia1").html(response);
			$("#ujerarquia1").html(response);
		}
	});
}

function agregar_categoria() {
	var form = $("#form_jerarquia").serialize();

	$.ajax({
		type: "post",
		url: "Categorias/add_categoria",
		data: form,		
		success: function (response) {
			alert(response);	
		 window.location.href='Categorias';
		}
	});
}

function editar_cat(id_cate,id_fam,nom_fam,descripcion,jerarquia,estadosubfam) {
	$("#uidecat").val(id_cate); 
	$("#uidefam").val(id_fam); 
	$("#ucategoria").val(descripcion);    
	$("#ujerarquia1").val(jerarquia); 
	$("#uestadocat").val(estadosubfam); 	
}

function edit_categoria() {
	var valor01 = $("#uidecat").val();    
	var valor02 = $("#uidefam").val();  
	var valor03 = $("#ucategoria").val();
    var valor04 = $("#ujerarquia1").val();
	var valor05 = $("#uestadocat").val();     	 
	var indica = $("#utipofam").val();     	 
    $.ajax({
        type: "post",
        url: "Categorias/updcategoria",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
			valor05 : valor05,
			indica : indica       
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Categorias';  
        }
    });
}

function eliminar_cat(cod,cod2) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Categorias/eliminar_categoria",
            data: {
				cod : cod, 
				cod2 : cod2         
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Categorias';              
            }
        });
    } else {
        window.location.href='Categorias';   
    }    
}