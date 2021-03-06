<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Tipos de Documentos</li>
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
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdtipodocs" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Tipo de documento</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Tipo Doc</th>
                    <th>Descripción</th>
                    <th>Código</th>                    
                    <th>Tipo Movimiento</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($tipodocs as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->cod_doc; ?></td>
                     <td><?= $item->nom_doc; ?></td>
                     <td><?= $item->tip_doc; ?></td>                                                                                 
                     <td>
                         <?php
                         if ($item->tip_mov == 'C') {
                           echo "<span class='badge badge-info'>Compra</span>";
                         }
                         if ($item->tip_mov == 'V') {
                            echo "<span class='badge badge-info'>Venta</span>";
                          }
                         
                         ?>                        
                    </td>
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
                            <button title="ELIMINAR TIPO_DOC" onclick="eliminar_tipodocs('<?= $item->cod_doc ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR TIPO_DOC" onclick="actualizar_tipodocs('<?= $item->cod_doc ?>','<?=$item->nom_doc ?>','<?=$item->tip_doc ?>','<?=$item->tip_mov ?>','<?=$item->estado ?>');"  data-toggle="modal" data-target="#modaleditartipodocs"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                                                  	
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
<div class="modal fade" id="modaladdtipodocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo documento</h5>
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
                  <input type="text" class="form-control" id="tipodoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Descripción</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="descripciondoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Código del tipo de Documento </label>
                <div class="col-sm-8">
                  <input type="number" class="form-control" id="codigodoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-8 col-form-label">Tipo de Movimiento </label>
                <div class="col-sm-8">                  
                  <select class="custom-select" id="tipomovdoc">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="C">Compra</option>
                      <option value="V">Venta</option>  
                  </select>
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
        <button onclick="agregar_tipodocs();" type="button" class="btn btn-primary">Agregar Tipo de documento</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Editar Tipodocs -->
  <div class="modal fade" id="modaleditartipodocs" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
          <input type="hidden" id="uidetipodocs" name="ide">
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                                                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updatetipodocs();" type="button" class="btn btn-primary">Guardar cambios</button>
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
