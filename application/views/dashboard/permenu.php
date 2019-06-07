<?php $this->load->view($header); // aqui van los css y los modulos ?> 




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Permiso Módulo</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
       
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
          <button onclick="userxmodulo();"  data-toggle="modal" data-target="#modulosper2"   class="btn btn-danger">
          <i class=" 	fas fa-unlock"></i> Permisos Módulos</button> 
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>                    
                    <th>Usuario</th>
                    <th>Rol</th>
                    <th>Perfil</th>
                    <th>Estado</th>
              
                    <th> Módulos Asignados</th>
                   
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($permenus as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->datos ?></td>
                     <td><?= $item->rol ?></td>
                     <td><?= $item->perfil ?></td>
                     <td>
                         <?php
                         if ($item->estado == '1') {
                           echo "<span class='badge badge-success'>Activo</span>";
                         }
                         if ($item->estado == '0') {
                            echo "<span class='badge badge-danger'>Inactivo</span>";
                          }                         
                         ?>                        
                    </td>
          
                     <td class="text-center">
                     <button data-toggle="modal" data-target="#modulosper" onclick="cargar_sumodulo(<?= $item->id_rol ?>);"   class="btn btn-warning btn-sm"> 
                        <i class=" fas fa-eye "></i> Ver Asignados</button><br>
                    </td>
                   
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
        </div>

      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


  <!--  Modal para añadir ver darpermiso-->
  <div class="modal fade bd-example-modal-lg" id="modulosper2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">PERMISOS A LOS ACCESOS DE LOS MÓDULOS</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>


        <div class="modal-body ">
   
          <div id="agenda" class="table-responsive">></div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        
        </div>
      </div>
    </div>
  </div>

  <!--  Modal para añadir ver permiso-->
  <div class="modal fade" id="modulosper" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Modulos Asignados</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              
        <div class="lista"></div> 

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cerrar</button>
        
        </div>
      </div>
    </div>
  </div>



  <!-- Logout Modal s-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cerrar Sesión</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Desea salir del sistema?</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a onclick="salir();" class="btn btn-primary" href="#">Salir</a>
        </div>
      </div>
    </div>
  </div>


<?php $this->load->view($footer); // aqui van los js ?>