$(document).ready(function() {

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

