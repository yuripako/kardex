<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Ubigeo</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
                        
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdubigeo" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Ubicación Geográfica</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>                 
                    <th>N°ro</th>
                    <th>Ubigeo</th>                    
                    <th>Departamento </th>
                    <th>Provincia</th>                                        
                    <th>Distrito</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($ubigeo as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->cod_ubi; ?></td>
                     <td><?= $item->depart; ?></td>                     
                     <td><?= $item->provincia; ?></td>                                          
                     <td><?= $item->district; ?></td>                                          
                     <td class="text-center">
                        <div class="btn-group">
                            <button title="ELIMINAR ubigeo" onclick="eliminar_ubigeo('<?= $item->cod_ubi ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR ubigeo" onclick="actualizar_ubigeo('<?= $item->cod_ubi ?>','<?=$item->depart ?>','<?=$item->provincia ?>','<?=$item->district ?>');"  data-toggle="modal" data-target="#modaleditarcambio"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                                                  	
                        </div>
                    </td>
                  </tr>
                <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          <div class="card-footer small text-muted">Updated...</div>
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

  <!-- Modal Agregar ubigeo -->
<div class="modal fade" id="modaladdubigeo" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Tipo de Cambio</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                                                       
            <!-- formulario -->
            <div class="row">                                                             
            <div class="col-md-6">                
              <div class="form-group row">
                <label for="disabledTextInput" class="col-sm-4 col-form-label">Ubigeo </label>
                <div class="col-sm-8">                   
                <input type="text" class="form-control"  id="codubigeo" width="276">
                </div>
              </div>              
            </div> 
           
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Departamento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control"  id="departamento" width="276">
                </div>
              </div>
            </div>            
            <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Provincia </label>
                      <div class="col-sm-8">
                      <input type="text" class="form-control"  id="provincia" width="276">
                      </div>
                  </div>
           </div>      
           <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Distrito</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="distrito" >
                </div>
              </div>
            </div>                           
            <!-- <input type="hidden" id="monedabas" name="ide">  -->      
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregar_ubigeo();" type="button" class="btn btn-primary">Agregar </button>
      </div>
    </div>
  </div>
</div>
</div>

<!-- Modal Editar Unidad -->
<div class="modal fade" id="modaleditarcambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar datos de ubigeo</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <!-- formulario -->
            <div class="row">                                                             
            <div class="col-md-6">
                <fieldset disabled> 
              <div class="form-group row">
                <label for="disabledTextInput" class="col-sm-4 col-form-label">Ubigeo </label>
                <div class="col-sm-8">                   
                  <input type="text" class="form-control" id="ucodubigeo" placeholder="">                    
                </div>
              </div>
              </fieldset>
            </div> 
           
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Departamento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="udepartamento" width="276">
                </div>
              </div>
            </div>            
            <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-4 col-form-label">Provincia </label>
                      <div class="col-sm-8">                        
                      <input type="text" class="form-control" id="uprovincia" width="276">
                      </div>
                  </div>
           </div>      
           <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-4 col-form-label">Distrito</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="udistrito">
                </div>
              </div>
            </div>                           
            <!-- <input type="hidden" id="monedabas" name="ide">  -->      
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                                                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updateubigeo();" type="button" class="btn btn-primary">Guardar cambios</button>
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
