$(document).ready(function () {	
    selelistaprecio();    
    selemoneda();
    $('#lpseletodos').on("click",function() {
        $(".case").prop("checked",this.checked);
    });         
    // if all checkbox are selected, check the selectall checkbox and viceversa
    $(".case").on("click", function() {
    if ($(".case").length == $(".case:checked").length) {
        $("#lpseletodos").prop("checked", true);
    } else {
        $("#lpseletodos").prop("checked", false);
    }
    });

    $('#additemxlista').DataTable({     
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        ajax: {
            url: 'Ordcompra/loadproductos',
            dataSrc: ''
        },dom: "Bfrtip",
        columns: [
            // { data: null, "render" : function(){
            //     return a++;
            // } },
            {   targets: 1,     
                data: null,          
                defaultContent: '',
                orderable: false,
                className: 'select-checkbox',
                'render': function (data, type, full, meta){
                    return '<input type="checkbox" name="case[]" value="' 
                       + $('<div/>').text(data).html() + '" class="case">';}
            },
           { data: 'cod_item' },
           { data: 'nom_item' },
           {  data: null, "render" : function(data){
                return "<input class='form-control col-sm-8' id='precio"+data.id_item+"' value='"+data.id_item*100+"'></input>";                 
             }                           
           },
          { data: null,"render" : function(data){
            return "<input class='form-control col-sm-8' id='precio"+data.id_item+"' value='"+data.id_item*100+"'></input>";
           } 
         },
         { data: null,"render" : function(data){
            return "<input class='form-control col-sm-8 ' id='precio"+data.id_item+"' value='"+data.id_item*100+"'></input>";
           } 
         }
        ],
        order: [ 1, 'asc' ],
        select: {
            style:    'os',
            selector: 'td:first-child'
        },
        scrollY: "500px",
        scrollCollapse: true,
        paging: false,
        scroller: true,
        fixedHeader: {header: true}
        
    });

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
          $("#sellispre2").html(response);		  
		}
	});
}

function cargalistaprecio(valor){  
    
    var cadena = valor.split('->');
<<<<<<< Updated upstream
    //  console.log(cadena[1]);     
    $("#monlispre").val(cadena[1]);   
    $("#tablaprecio").DataTable({       
=======
    //  console.log(cadena[1]);
     
    $("#monlispre").val(cadena[1]);
    
    $("#tablaprecio").DataTable({   
            
>>>>>>> Stashed changes
        ajax:{
            type: "post",
            url: "Listprecio/carga_listaprecio",
            //dataType : "json",
            data: {
                valor : cadena[0]
            }
<<<<<<< Updated upstream
        },        
=======
        },
        
>>>>>>> Stashed changes
        //order: [0, 'desc'],
        dom: "Bfrtip",
        sAjaxDataProp: "",
         columns : [
            { data : "cod_item" },
            { data : "nom_item" },
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
        //success: function (response) {
		//    console.log(response);   }
     });     
}

function editarlistaitem(v1,v2,v3,v4,v5) {
    //alert('hello paquex'+ v1 + '->' + v2);
    alert(v1);
    $("#rol22").val(v1);

}

function selemoneda(){
    $.ajax({
        type : "post",
        url : "Listprecio/selemoneda",
        data : {},
        success : function (params) {
            $('#lpselemoneda').html(params);
            $('#lpselemoneda2').html(params);
            //console.log(params);
        }
    });
}

function agregar_listaprecio() {        
    var valor01 = $("#lpcodlist").val();
    var valor02 = $("#lpnomlist").val();
    var valor03 = $("#lpselemoneda").val();
    var valor04 = $("#lpestado").val();      
         
     $.ajax({
         type: "post",
         url: "Listprecio/addlistaprecio",
         data: {           
            valor01 : valor01,
            valor02 : valor02,           
            valor03 : valor03,   
            valor04 : valor04                            
         },  
         success: function (response) {
            alert (response) ; //Aqui recibo mi mensajede mivariable output. Insert, delete, update.
            window.location.href='Listprecio';  
            //console.log(response);
             
         }
     });
    
}

function agregar_itemxlista() {
    console.log();
}

function cargalistaprecio2(valor){  
    
    var cadena = valor.split('->');
    //  console.log(cadena[1]);     
    $("#monlispre").val(cadena[1]);

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