

  <!-- Bootstrap core JavaScript-->
  <script src="<?= base_url('public/vendor/jquery/jquery.min.js'); ?>"></script>
  <script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>

  <!-- Core plugin JavaScript-->
  <script src="<?= base_url('public/vendor/jquery-easing/jquery.easing.min.js'); ?>"></script>
  <!-- Page level plugin JavaScript-->
 <script src="<?= base_url('public/vendor/chart.js/Chart.min.js'); ?>"></script>
 <script src="<?= base_url('public/vendor/datatables/jquery.dataTables.js'); ?>"></script>
 <script src="<?= base_url('public/vendor/datatables/dataTables.bootstrap4.js'); ?>"></script>

  <!-- Custom scripts for all pages-->
 <script src="<?= base_url('public/js/sb-admin.min.js'); ?>"></script>

  <!-- Demo scripts for this page-->
 <script src="<?= base_url('public/js/demo/datatables-demo.js'); ?>"></script>
 <script src="<?= base_url('public/js/demo/chart-area-demo.js'); ?>"></script>
 <!-- Calendario -->
 <script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
 
  <!-- Librerías de choosen Seleccion-->
  <!-- 
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
 <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/chosen/1.8.7/chosen.jquery.min.js"></script>  -->

<!--AQUI VA NUESTRO JS SE DEBE LLAMAR IGUAL QUE EL CONTROLADOR PERO MINUSCULA hhhh-->
   <script src="<?= base_url('public/js/inicio.js'); ?>"></script>
   <script src="<?= base_url('public/js/categorias.js'); ?>"></script>
   <script src="<?= base_url('public/js/articulo.js'); ?>"></script>
   <script src="<?= base_url('public/js/usuario.js'); ?>"></script>
   <script src="<?= base_url('public/js/moneda.js'); ?>"></script>
   <script src="<?= base_url('public/js/vendedor.js'); ?>"></script>
   <script src="<?= base_url('public/js/unmedida.js'); ?>"></script>
   <script src="<?= base_url('public/js/conpago.js'); ?>"></script>
   <script src="<?= base_url('public/js/tipcambio.js'); ?>"></script>
   <script src="<?= base_url('public/js/ubigeo.js'); ?>"></script>
   <script src="<?= base_url('public/js/tipomov.js'); ?>"></script>
   <script src="<?= base_url('public/js/tipodocs.js'); ?>"></script>
   <script src="<?= base_url('public/js/serieynum.js'); ?>"></script>
   <script src="<?= base_url('public/js/almacen.js'); ?>"></script>
   <script src="<?= base_url('public/js/impuesto.js'); ?>"></script>
   <script src="<?= base_url('public/js/roles.js'); ?>"></script>
   <script src="<?= base_url('public/js/permodu.js'); ?>"></script>
   <script src="<?= base_url('public/js/listprecio.js'); ?>"></script>
   <script src="<?= base_url('public/js/proveedor.js'); ?>"></script>
   <script src="<?= base_url('public/js/ordcompra.js'); ?>"></script>
   <script src="<?= base_url('public/js/cliente.js'); ?>"></script>

   <script>

      $(document).ready(function () {
        $(".card-header ").removeAttr("style");
        $(".card-header").attr('style',  'background-color:#00a4b4');
     
        $(".card-footer").attr('style',  'display:none');
      });

      $('#fechacam').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });


    $('#fecha_emi').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });

    $('#fecha_ven').datepicker({
        uiLibrary: 'bootstrap4',
        format: 'yyyy-mm-dd'
    });


    </script>
   <!--FIN DE QUERY -->

    <!--FIN DE QUERY -->

</body>

</html>
