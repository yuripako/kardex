<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">articulos</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button  data-toggle="modal" data-target=".bd-example-modal-lg"  class="btn btn-warning"><i class="fas fa-plus "></i> Agregar producto</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Código</th>
                    <th>Nombre</th>
                    <th>Moneda</th>
                    <th>Categoría</th>
                    <th>Estado</th>
                    <th>Unidad</th>
                    <th>Lote</th>
                    <th>Bien</th>
                    <th>Impuesto</th>
                    <th>Descripcion</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <tbody  style="text-transform: lowercase;">
                  <?php $cont=1; foreach ($articulos as $item) { ?>
                  <tr>
                    <td><?= $cont++ ?></td>
                    <td><?= $item->cod_item  ?></td>
                    <td><?= $item->nom_item  ?></td>
                    <td><?= $item->nom_mone  ?></td>
                    <td><?= $item->nom_cate  ?></td>
                    <td>
                      <?php 
                      if ($item->estado == '0') { echo "<span class='badge badge-danger'>Inactivo</span>";} 
                      if ($item->estado == '1') { echo "<span class='badge badge-success'>Activo</span>";}
                      ?>
                    </td>
                    <td><?= $item->nom_unid  ?></td>
                    <td><?= $item->num_lote  ?></td>
                    <td><?= $item->bien  ?></td>
                    <td><?= $item->impuesto  ?></td>
                    <td><?= $item->descripcion  ?></td>

                    <td class="text-center">
                        <div class="btn-group">
                        	<button onclick="eliminar_producto(<?= $item->id_item?>);" title="ELIMINAR PRODUCTO" class="btn btn-danger" > <i class="fas fa-trash "></i> </button>
                        	<button title="EDITAR PRODUCTO" data-toggle="modal" data-target="#logoutModal3"  class="btn btn-warning"> <i class="fas fa-edit "></i> </button>
                        	
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

      <!-- Sticky Footer -->


    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

 <!--MODAL PARA AGREGAR PRODUCTOS -->
 
  <!-- Large modal -->
<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       
       <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo producto</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          
        <div class="row">
           <div class="col-md-6">
           
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label" >Código </label>
              <div class="col-sm-8">
                <input type="text" class="form-control" id="codigo"  maxlength="10" required>
                
              </div>
            </div>

           </div>
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nombre </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="nombre">
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
                    <label for="inputPassword" class="col-sm-3 col-form-label">Categoría </label>
                      <div class="col-sm-8">
                        <select class="form-control" id="categoria" name="categoria" >  
                        </select>
                      </div>
                  </div>
           </div>

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="estado">
                          <option value="">--[ Seleecione ]--</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>
                        </select>
                      </div>
                  </div>
           </div>    

           
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Unidades </label>
                      <div class="col-sm-8">
                        <select class="form-control" name="unidad" id="unidad">
                        
                        </select>
                      </div>
                  </div>
           </div>
 
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">N°ro Lote </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="lote"  maxlength="20">
                    </div>
                  </div>
           </div>
           
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Bien </label>
                      <div class="col-sm-8">
                        <select class="form-control" id="bien">
                          <option value="">--[ Seleecione ]--</option>
                          <option value="1">P1</option>
                          <option value="2">P2</option>
                          <option value="3">P3</option>
                        </select>
                      </div>
                  </div>
           </div>   

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Impuesto </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="inpuesto">
                          <option  value="">--[ Seleecione ]--</option>
                          <option value="0">Afectado</option>
                          <option value="1">No Afectado</option>
                         
                        </select>
                      </div>
                  </div>
           </div> 

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Descripción </label>
                    <div class="col-sm-8">
                      <textarea name="descripcion" id="descripcion" class="form-control"></textarea>
                    </div>
                  </div>
           </div>


        </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a onclick= "agregar_producto();" class="btn btn-primary" href="#">Agregar producto</a>
        </div>
      </div>

    </div>
  </div>
</div>
 <!--FIN DE MODAL -->

 
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