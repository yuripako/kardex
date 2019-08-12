$(document).ready(function() {
    var a =1;
    var p ="";
    $('#compra').DataTable({
     
        "language": {
            "url": "//cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        },
        ajax: {
            url: 'Ordcompra/loadproductos',
            dataSrc: ''
        },dom: "Bfrtip",
        columns: [
            { data: null, "render" : function(){
                return a++;
            } },
          
           { data: 'cod_item' },
           { data: 'nom_item' },
           {  data: null, "render" : function(data){
             p= "<select id='cantidad"+data.id_item+"' class='form-control'>";
             for (let index = 1; index <= 100; index++) {
                p+= "<option value='"+index+"'>"+index+"</option>";
                 
             }
               p+="</select>";
               return p;
            } 
           },
          { data: null,"render" : function(data){
            return "<input class='form-control' id='precio"+data.id_item+"' value='"+data.id_item*100+"'></imput>";
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
    var codigo =  codigo;
    var producto =  producto;

    var htmlTags = '<tr>'+
    '<td>' + codigo + '</td>'+
    '<td>' + cantidad + '</td>'+
    '<td>' + producto + '</td>'+
    '<td>' + precio + '</td>'+
    '<td>' + (precio*cantidad) + '</td>'+
   
    '<td><i class="fas fa-trash "></i></td>'+
  '</tr>';
  
$('#tablafactura tbody').append(htmlTags);

}