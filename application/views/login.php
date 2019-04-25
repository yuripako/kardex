<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>SB Admin - Login</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="<?= base_url('public/vendor/fontawesome-free/css/all.min.css')  ?>" type="text/css">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?= base_url('public/css/sb-admin.css')  ?>" type="text/css">

</head>

<body style=" background-image: url('https://www.urugrow.com.uy/media/envios/warehouse_boxes.jpeg')">

  <div class="container">
      <!--
      <div class="card">
        <div class="card-header">
          Acessos como administrador  --  puedes crear mas usuarios segun rol y tipo usuario en la tabla user
        </div>
        <div class="card-body">
          <blockquote class="blockquote mb-0">
    
            <span>Usuario: multigla</span>  <br>
            <span> Password: 3H5+Jl47Ftms-W</span>  
            <footer class="blockquote-footer">https://201.148.107.64/cpanel <cite title="Source Title"> </cite></footer>
          </blockquote>
        </div>
      </div>
   -->
   <div style="padding:8%"></div>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header ">Iniciar Sesión</div>
      <div class="card-body">
       
          <div class="form-group">
            <label for="exampleInputEmail1">Usuario</label>
            <input type="email" class="form-control" id="user" value="paco" >
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Contraseña</label>
            <input type="text" class="form-control" id="pass"  value="123">
          </div>
         
          <a href="#" onclick="login();" class="btn btn-primary btn-block">Ingresar al sistema</a>
    

      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->

   <script src="<?= base_url('public/vendor/jquery/jquery.min.js') ?>"></script>
   <script src="<?= base_url('public/vendor/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>

  <!-- Core plugin JavaScript-->
   <script src="<?= base_url('public/vendor/jquery-easing/jquery.easing.min.js') ?>"></script>

   <script src="<?= base_url('public/js/login.js') ?>"></script>

</body>

</html>

