$(document).ready(function() {
  $( "#seriee" ).attr( "  <option value=''>[-Serie-]</option>" );
  


  $("#seriee").attr('disabled','disabled');
  $("#correlativoo").attr('disabled','disabled');
  

  loadcondi();
  loadmonedaa();
  loadtipodocss();

    $('#compra').DataTable({
     
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        ajax: {
            url: 'Ordcompra/loadproductos',
            dataSrc: ''
        },dom: "Bfrtip",
        columns: [
          
           { data: 'cod_item' },
           { data: 'nom_item' },
           {  data: null, "render" : function(data){
            return "<input class='form-control' type='number' id='cantidad"+data.id_item+"' placeholder='0'></imput>";
            } 
           },
          { data: null,"render" : function(data){
            return "<input class='form-control'  type='number'  id='precio"+data.id_item+"' placeholder='0.0'></imput>";
           } 
         },
         { data: null,"render" : function(data){
            return "<div class='text-center'>"+
            "<button onclick=\"agregar("+data.id_item+",'" + data.cod_item + "','" + data.nom_item + "');\"  "+
            "  class='btn btn-info btn-sm '><i class='fas fa-plus'></i></button></div>";
           } 
         }
        ]


    });
} );



function agregar(item,codigo,producto) {
    var precio = $("#precio"+item).val();
    var cantidad = $("#cantidad"+item).val();
   
   
     if (precio=="" || cantidad=="") {
       alert("Precio / cantidad no pueden ser nulos");
     }else{
      var codigo =  codigo;
      var producto =  producto;

      var subtotal = (precio*cantidad);
      var igv = (subtotal*(0.18));
      var total = (subtotal + igv);
      $("#subtotal").val(subtotal);
      $("#igv").val(igv);
      $("#total").val(total);
      
      //  $.ajax({
      //    type: "method",
      //    url: "url",
      //    data: "data",
      //    dataType: "dataType",
      //    success: function (response) {
           
      //    }
      //  });

  
      var htmlTags = '<tr>'+
      '<td>' + codigo + '</td>'+
      '<td>' + cantidad + '</td>'+
      '<td>' + producto + '</td>'+
      '<td>' + precio + '</td>'+
      '<td>' + (precio*cantidad) + '</td>'+
      '<td><i class="fas fa-trash "></i></td>'+
      " </tr>";

  $('#tablafactura tbody').append(htmlTags);

     }
    
}


function busqueda_ruc() {
  var ruc =    $("#ruc").val();
   $.ajax({
     type: "post",
     url: "Ordcompra/buscaRuc",
     data: {
       ruc :ruc
     },
     success: function (response) {
      
       $("#encontrado").html(response);
       $("#encontrado").show();
     }
   });
   
} 

function selecruc(ruc,nom) {
  $("#ruc").val(ruc);
  $("#nomcli").val(nom);
  $("#encontrado").hide();
}

function loadcondi() 
{
  $.ajax({
    type: "post",
    url: "Ordcompra/load_condiciones",
    data: { },
    success: function (response) {
     $("#condicion").html(response);
     //
      
    }
  });  
}

function loadmonedaa() 
{
  $.ajax({
    type: "post",
    url: "Ordcompra/load_monedas",
    data: { },
    success: function (response) {
     $("#monedass").html(response);
     
      
    }
  });  
}

function loadtipodocss() 
{
  $.ajax({
    type: "post",
    url: "Ordcompra/load_tipodocs",
    data: { },
    success: function (response) {
     $("#tipodoc").html(response);
     
      
    }
  });  
}


function habilitarSerie(e) {
  var serie = e;
  if (serie=="") {
    $("#seriee").attr('disabled','disabled');
    $("#correlativoo").attr('disabled','disabled');
    $("#seriee").empty();
  
  }else {
    $("#seriee").removeAttr('disabled');
    $("#correlativoo").removeAttr('disabled');
    
    $.ajax({
      type: "post",
      url: "Ordcompra/load_series ",
      data: {
        serie:serie
      },
      success: function (response) {
        $("#seriee").html(response);
      }
    });

  }
}

    
function busqueda_correlativo(e){
  var filtro = e;

  if (filtro=="") {
    $("#encontrado_correlativo").hide();
  } else {
    
 

  var tipodoc =  $("#tipodoc").val();
  $.ajax({
    type: "post",
    url: "Ordcompra/filtro_correlativo",
    data: {
      filtro : filtro,
      tipodoc : tipodoc
    },
    success: function (response) {
     $("#encontrado_correlativo").html(response);
     $("#encontrado_correlativo").show();
      
    }
  });

}

}

function seleccorrelativo(correlativo) {
  $("#correlativoo").val(correlativo);

  $("#encontrado_correlativo").hide();
}