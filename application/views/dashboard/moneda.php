<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Moneda</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
        <!-- <div class="alert alert-success" role="alert" id="borradocat">
			 	  <label for="">Se Elimino la Moneda correctamente!</label>
		    </div> -->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdmoneda" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar moneda</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Codigo</th>
                    <th>Moneda</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($moneda as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->cod_mone; ?></td>
                     <td><?= $item->nom_mone; ?></td>
                     <td><?= $item->descripcion; ?></td>
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
                        <div class="btn-group">
                          <button title="ELIMINAR PRODUCTO" onclick="eliminar_moneda('<?= $item->cod_mone ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                        	<button title="EDITAR PRODUCTO" onclick="editar_moneda('<?= $item->cod_mone ?>','<?= $item->nom_mone ?>','<?= $item->descripcion ?>','<?= $item->estado ?>');" data-toggle="modal" data-target="#modaleditarmoneda"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                        	
                        </div>
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

  <!-- Modal Agredar Moneda -->
<div class="modal fade" id="modaladdmoneda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <div class="form-group">
                <label>Codigo</label>
                <input type="text" class="form-control" id="codigo" placeholder="Codigo de moneda">                
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="nombre" placeholder="Nombre de moneda">
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea id="descripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select class="custom-select" id="estado">
                    <option selected>--[ seleccione estado ]--</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>                    
                </select>
            </div>                              

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregar_moneda();" type="button" class="btn btn-primary">Agregar moneda</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Editar Moneda -->
  <div class="modal fade" id="modaleditarmoneda" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar moneda</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <div class="form-group">
                <label>Codigo</label>
                <input type="text" class="form-control" id="ucodigo" placeholder="Codigo de moneda">                
            </div>

            <div class="form-group">
                <label>Nombre</label>
                <input type="text" class="form-control" id="unombre" placeholder="Nombre de moneda">
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea id="udescripcion" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label>Estado</label>
                <select class="custom-select" id="uestado">
                    <option selected>--[ seleccione estado ]--</option>
                    <option value="1">Activo</option>
                    <option value="0">Inactivo</option>                    
                </select>
            </div>                              

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updatemoneda();" type="button" class="btn btn-primary">Actualizar moneda</button>
      </div>
    </div>
  </div>
</div>



  <!-- Logout Modal-->
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