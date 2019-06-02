<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Proveedores</li>
        </ol>

        <!-- <nav>
          <div class="nav nav-tabs" id="nav-tab" role="tablist">
            <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Tipo de documentos</a>
            <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Parametrización</a>            
          </div>
        </nav> -->
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
        <canvas id="myAreaChart" height="0"  style="display: none;"></canvas>
        <!-- <div class="alert alert-success" role="alert" id="borradocat">
			 	  <label for="">Se Elimino el Tipo de documento </label>
		    </div> -->
        <div class="tab-content" id="nav-tabContent">
          <!-- <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">... -->
              <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdproveedor" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Proveedor</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Tipo</th>                    
                    <th>Telefono</th>
                    <th>Procedencia</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($proveedor as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->nom_emp; ?></td>
                     <td><?= $item->ruc_nif; ?></td>
                     <td><?= $item->tip_doc; ?></td>                                                                                 
                     <td><?= $item->telf_emp; ?></td>       
                     <td><?= $item->procedencia; ?></td>                       
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
                            <button title="ELIMINAR PROVEEDOR" onclick="eliminar_proveedor('<?= $item->id_proveedor ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR PROVEEDOR" onclick="actualizar_proveedor('<?= $item->id_proveedor ?>','<?=$item->nom_emp ?>','<?=$item->tip_doc ?>','<?=$item->ruc_nif ?>','<?=$item->estado ?>');"  data-toggle="modal" data-target="#modaleditarproveedor"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                                                  	                            
                        </div>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated...</div>
        <!-- </div> -->

          <!-- </div>
          <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">...


          </div>
          <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">...</div> -->
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

  <!-- Modal Agredar Tipodocs -->
<div class="modal fade" id="modaladdproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                                                       
            <!-- formulario -->
            <div class="row">

            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Nombre Empresa </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="emppro">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">RUC/DNI</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="docpro">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Tipo </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="tippro">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Teléfono </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="tlfpro">
                </div>
              </div>
            </div>   
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Procedencia </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="procepro">
                </div>
              </div>
            </div>         
           
          </div>

          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregar_proveedor();" type="button" class="btn btn-primary">Agregar Tipo de documento</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Editar Tipodocs -->
  <div class="modal fade" id="modaleditarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Tipo de documento</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <!-- formulario -->
            <div class="row">

            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Tipo Documento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="utipodoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="udescripciondoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Código del tipo de Documento </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="ucodigodoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Tipo de Movimiento </label>
                <div class="col-sm-8">                  
                  <select class="custom-select" id="utipomovdoc">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="C">Compra</option>
                      <option value="V">Venta</option>  
                  </select>
                </div>
              </div>
            </div>            
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Estado </label>
                <div class="col-sm-8">
                  <select class="custom-select" id="uestadodoc">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>  
                  </select>
                </div>
              </div>
            </div>
          </div>       
          <input type="hidden" id="uideproveedor" name="ide">
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                                                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updateproveedor();" type="button" class="btn btn-primary">Guardar cambios</button>
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