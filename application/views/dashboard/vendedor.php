<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Vendedor</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
        <!-- <div class="alert alert-success" role="alert" id="borradocat">
			 	  <label for="">Se Elimino el vendedor correctamente!</label>
		</div> -->
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdvendedor" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Vendedor</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Teléfono</th>
                    <th>Correo</th>
                    <th>Zona</th>
                    <th>Región</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($vendedor as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->nombre . ' ' . $item->apellido; ?></td>
                     <td><?= $item->dni_nif; ?></td>
                     <td><?= $item->telefono; ?></td>
                     <td><?= $item->correo; ?></td>
                     <td><?= $item->zona; ?></td>
                     <td><?= $item->region; ?></td>                     
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
                            <button title="ELIMINAR VENDEDOR" onclick="eliminar_vendedor('<?= $item->idvendedor ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR VENDEDOR" onclick="actualizar_vendedor('<?= $item->idvendedor ?>','<?=$item->nombre ?>','<?=$item->apellido ?>','<?=$item->dni_nif ?>','<?=$item->telefono ?>','<?=$item->correo ?>','<?=$item->zona ?>','<?=$item->region ?>','<?=$item->estado ?>');"  data-toggle="modal" data-target="#modaleditarvendedor"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                                                  	
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

  <!-- Modal Agredar Vendedor -->
<div class="modal fade" id="modaladdvendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                                                       
            <!-- formulario -->
            <div class="row">

            <div class="col-md-6">

              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Nombre*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nombre_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Apellido*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="apellido_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Documento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="documento_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Teléfono </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="telefono_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Correo </label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="correo_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Zona </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="zona_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Región </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="region_ven">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                <div class="col-sm-8">
                  <select class="custom-select" id="estado_ven">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>  
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
        <button onclick="agregar_vendedor();" type="button" class="btn btn-primary">Agregar vendedor</button>
      </div>
    </div>
  </div>
</div>

  <!-- Modal Editar Vendedor -->
  <div class="modal fade" id="modaleditarvendedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Vendedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <!-- formulario -->
            <div class="row">

            <div class="col-md-6">

              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Nombre*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="unombre">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Apellido*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="uapellido">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Documento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="udocumento">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Teléfono </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="utelefono">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Correo </label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="ucorreo">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Zona </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="uzona">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Región </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="uregion">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                <div class="col-sm-8">
                  <select class="custom-select" id="uestado">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="1">Activo</option>
                      <option value="0">Inactivo</option>  
                  </select>
                </div>
              </div>
            </div>
          </div>          
          <input type="hidden" id="uidevendedor" name="ide">
          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>                                                        

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updatevendedor();" type="button" class="btn btn-primary">Guardar cambios</button>
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
