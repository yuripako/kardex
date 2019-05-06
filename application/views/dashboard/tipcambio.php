<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Tipo de cambio</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
        <div class="alert alert-success" role="alert" id="borradocat">
			 	  <label for="">Se Elimino el tipo de cambio correctamente!</label>
		</div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdtipcambio" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Tipo de cambio</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>                 
                    <th>N°ro</th>
                    <th>Fecha</th>                    
                    <th>Moneda </th>
                    <th>Valor</th>                                        
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($tipcambio as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->fecha_cam; ?></td>
                     <td><?= $item->moneda_cod_mone; ?></td>                     
                     <td><?= $item->tipocambio; ?></td>                                          
                     <td class="text-center">
                        <div class="btn-group">
                            <button title="ELIMINAR tipcambio" onclick="eliminar_tipcambio('<?= $item->moneda_cod_mone ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR tipcambio" onclick="actualizar_tipcambio('<?= $item->moneda_cod_mone ?>','<?=$item->fecha_cam ?>','<?=$item->monbas ?>','<?=$item->tipocambio ?>');"  data-toggle="modal" data-target="#modaleditartipcambio"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                                                  	
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

  <!-- Modal Agregar tipcambio -->
<div class="modal fade" id="modaladdtipcambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <label for="inputPassword" class="col-sm-3 col-form-label">Fecha de cambio </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="codigound">
                </div>
              </div>
            </div>            
            <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Moneda </label>
                      <div class="col-sm-8">
                        <select class="form-control" name="moneda"  id="moneda">
                         
                        </select>
                      </div>
                  </div>
           </div>      
           <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Valor</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nombreund">
                </div>
              </div>
            </div>                           

          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick="agregar_tipcambio();" type="button" class="btn btn-primary">Agregar </button>
      </div>
    </div>
  </div>
</div>

 <!-- Modal Editar Unidad -->
 <div class="modal fade" id="modaleditartipcambio" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Unidad</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <!-- formulario -->
            <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Codigo</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="ucodigound">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Nombre</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="unombreund">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Origen </label>
                <div class="col-sm-8">
                    <select class="custom-select" id="uindori">
                        <option selected>--[ seleccione origen ]--</option>
                        <option value="0">Compras</option>
                        <option value="1">Ventas</option>                        
                    </select>
                </div>
              </div>
            </div>                    
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                <div class="col-sm-8">
                  <select class="custom-select" id="uestadound">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>                        
                  </select>
                </div>
              </div>
            </div>
          </div>
          <input type="hidden" id="uidtipcambio" name="ide">
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                                                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updatetipcambio();" type="button" class="btn btn-primary">Guardar cambios</button>
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
