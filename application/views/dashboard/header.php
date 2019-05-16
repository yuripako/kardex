<!-- <?= $this->session->userdata('nom_rol') ?> -->


<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Gestión Comercial</title>

  <!-- Custom fonts for this template-->
  <link rel="stylesheet" href="<?= base_url('public/vendor/fontawesome-free/css/all.min.css'); ?>">
  <!-- Page level plugin CSS-->
  <link rel="stylesheet" href="<?= base_url('public/vendor/datatables/dataTables.bootstrap4.css'); ?>">
  <!-- Custom styles for this template-->
  <link rel="stylesheet" href="<?= base_url('public/css/sb-admin.css'); ?>">
  <!-- date picker-->
  <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />
  <!-- Icono -->
  <link rel="shortcut icon" href="public/images/multiglass-hojas.ico" />
  
  <style>
    @media screen and (max-width: 700px) {
      #logogo{
      display:none;
      }
    }
  </style>
</head>

<body id="page-top">

  <nav class="navbar navbar-expand  static-top" style="background-color: #00a4b4; ">

    <a class="navbar-brand mr-1" href="<?= base_url('Inicio')?>" style="color: #fff">PANEL</a>

    <button class="btn btn-link btn-sm text-white order-1 order-sm-0" id="sidebarToggle" href="#">
      <i class="fas fa-bars"></i>
    </button>

    <!-- Navbar Search -->
    <form class="d-none d-md-inline-block form-inline ml-auto mr-0 mr-md-3 my-2 my-md-0">
      
    </form>

    <!-- Navbar -->
    <ul class="navbar-nav ml-auto ml-md-0">
      <li class="nav-item dropdown no-arrow" >
        <a  class="nav-link dropdown-toggle" href="#" id="userDropdown2" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="color: #fff">
          Bienvenido <?= $this->session->userdata('username') ?> <i class="fas fa-user-circle fa-fw"></i> 
        </a> 
        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown2">
          <a class="dropdown-item" href="#"><?= $this->session->userdata('nom_rol') ?></a>
          <div class="dropdown-divider"></div>
          <a  class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">Cerrar Sesión</a>
        </div>
      </li>
    </ul>

  </nav>


  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="sidebar navbar-nav">
    <br>
<!-- LOGO INICIO -->
  <div id="cardi">
        <div id="logogo" class="card" style="background-color: #212529;border: 0px;margin: 0px auto;">
          <img id="imgu" src="<?= base_url('public/images/user.png'); ?> " style="width: 190px;margin: 0 auto;"   class="card-img-top" >
          <div class="card-body" style="  color: #ccc;    text-align: center;">
              <h5 class="card-title"><?= $this->session->userdata('username') ?></h5>
              <p class="card-text"><?= $this->session->userdata('nom_rol') ?></p>
          </div>
        </div>
 
    </div>
<!--FIN DE LOGO INICIO -->
 <div style="padding:10px"></div>
    <li class="nav-item active">
      <a class="nav-link" href="<?= base_url('Inicio') ?>">
            <i class="fa fa-home"></i>
            <span>Inicio</span>
      </a>
      </li>
    <?php foreach ($modulos as $item) {  ?>
      <li class="nav-item dropdown  active">
        <a  onclick="menu(<?= $item->id_permiso ?>)" class="nav-link dropdown-toggle" href="#" id="<?= $item->modulo ?>" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="<?= $item->icono ?>"></i>
          <span><?= $item->modulo ?></span>
        </a>
        <div  class="dropdown-menu pe" aria-labelledby="<?= $item->modulo ?>" x-placement="top-start" style="position: absolute; will-change: transform; top: 0px; left: 0px; transform: translate3d(5px, -107px, 0px);">
        
          
         
        </div>
      </li>
    <?php } ?>
 
    </ul>

  


    <div id="load"></div>