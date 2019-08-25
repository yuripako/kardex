$(document).ready(function () {	
    selelistaprecio();    
    
});
function selelistaprecio() {
	$.ajax({
		type: "post",
		url: "Listprecio/sele_listaprecio",
		data: {},
		success: function (response) {
		    console.log(response);
          $("#sellispre").html(response);
          $("#monlispre").html(response);		  
		}
	});
}

function cargalistaprecio(valor){  
    
    var cadena = valor.split('->');
    //  console.log(cadena[1]);
     
    $("#monlispre").val(cadena[1]);
    
    $("#tablaprecio").DataTable({       
        ajax:{
            type: "post",
            url: "Listprecio/carga_listaprecio",
            //dataType : "json",
            data: {
                valor : cadena[0]
            }
        },
        //order: [0, 'desc'],
        dom: "Bfrtip",
        sAjaxDataProp: "",
         columns : [
            { data : "cod_lista" },
            { data : "cod_prod" },
            { data : "preciovta_base" },
            { data : "prc_dscto" },
            { data : "preciovta_fin" },
            { data: null,"render" : function(data){
                return "<div class='text-center'>"+
            "<button onclick=\"editarlistaitem("+data.cod_lista+",'" + data.cod_prod + "','" + data.preciovta_base + "','" + data.prc_dscto +  "','" + data.preciovta_fin + "');\"  "+
            "data-toggle='modal' data-target='#editalistaitem'  class='btn btn-info btn-sm '><i class='fas fa-edit'></i></button></div>";
                }
            }                     
        ],
        select: true,
        destroy: true                            
     });    
}

function editarlistaitem(v1,v2,v3,v4,v5) {
    //alert('hello paquex'+ v1 + '->' + v2);
    alert(v1);
    $("#rol22").val(v1);

}

function agregar_serieynum() {        
    var valor01 = $("#tiposerdoc").val();
    var valor02 = $("#tiposerdoc").val();
    var valor03 = $("#serieserdoc").val();
    var valor04 = $("#numeracionserdoc").val();
    var valor05 = $("#descripcionserdoc").val();        
         
     $.ajax({
         type: "post",
         url: "Serieynum/addserieynum",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04,                      
            valor05 : valor05
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Serieynum';  
            //console.log(response);
             
         }
     });
    
}

function actualizar_serieynum(id_num,cod_doc,serie,correlativo,descripcion,estado) {
    $("#uidserieynum").val(id_num);     
    $("#utiposerdoc").val(cod_doc);     
    $("#userieserdoc").val(serie);     
    $("#unumeracionserdoc").val(correlativo);
    $("#udescripcionserdoc").val(descripcion);    
    $("#uestadoserdoc").val(estado);      
}

function updateserieynum() {
    var valor01 = $("#uidserieynum").val();
    var valor02 = $("#utiposerdoc").val();
    var valor03 = $("#userieserdoc").val();
    var valor04 = $("#unumeracionserdoc").val();    
    var valor05 = $("#udescripcionserdoc").val();    
    var valor06 = $("#uestadoserdoc").val(); 
    $.ajax({
        type: "post",
        url: "Serieynum/updserieynum",
        data: {
            valor01 : valor01,
            valor02 : valor02,
            valor03 : valor03,                   
            valor04 : valor04,
            valor05 : valor05,         
            valor06 : valor06    
        },  
        success: function (response) {
            alert (response) ;
            window.location.href='Serieynum';  
        }
    });
}

function eliminar_serieynum(cod) {
    var rpta = window.confirm("¿Desea eliminar el registro?");
    if (rpta == true) {
        $.ajax({
            type: "post",
            url: "Serieynum/delserieynum",
            data: {
                cod : cod            
            },
            success: function (response) {
                alert (response) ;
                window.location.href='Serieynum';              
            }
        });
    } else {
        window.location.href='Serieynum';   
    }    
}