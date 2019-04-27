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
                    <th>TipoBien</th>
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
                    <td>
                    <?php 
                      if ($item->tip_bien == '0') { echo "<span class='badge badge-info'>Bienes</span>";} 
                      if ($item->tip_bien == '1') { echo "<span class='badge badge-primary'>Servicio</span>";}
                      ?>
                    
                    </td>
                    <td>
                    <?php 
                      if ($item->ind_iva == '0') { echo "<span class='badge badge-danger'>NoAfecto</span>";} 
                      if ($item->ind_iva == '1') { echo "<span class='badge badge-success'>Afecto</span>";}
                      ?>
                    </td>
                    <td><?= $item->descripcion  ?></td>

                    <td class="text-center">
                        <div class="btn-group">
                        	<button onclick="eliminar_producto(<?= $item->id_item?>);" title="ELIMINAR PRODUCTO" class="btn btn-danger" > <i class="fas fa-trash "></i> </button>
                        	<button data-toggle="modal" data-target=".bd-example-modal-lg2" onclick="editar_producto(<?= $item->id_item?>,'<?= $item->cod_item  ?>','<?= $item->nom_item  ?>','<?= $item->cod_mone  ?>',
                          '<?= $item->id_cate  ?>','<?= $item->estado  ?>','<?= $item->cod_unid  ?>','<?= $item->num_lote  ?>','<?= $item->tip_bien  ?>','<?= $item->ind_iva  ?>',
                          '<?= $item->descripcion  ?>' );" title="EDITAR PRODUCTO"   class="btn btn-warning"> <i class="fas fa-edit "></i> </button>
                        	                 <!-- id,codigo,nombre,moneda,categoria,estado,unidad,lote,bien,impuesto,descripcion -->
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
 
  <!-- Large modal PARA INSERTAR -->
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
                          <option value="0">Vendido</option>
                          <option value="1">Cedido</option>
                        </select>
                      </div>
                  </div>
           </div>   

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Impuesto </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="impuesto">
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

   <!-- Large modal PARA EDITAR -->
<div class="modal fade bd-example-modal-lg2" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
       
       <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar  producto</h5>
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
                <input type="text" class="form-control" id="ucodigo"  maxlength="10" required>
                
              </div>
            </div>

           </div>
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Nombre </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="unombre">
                    </div>
                  </div>
           </div>

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Moneda </label>
                      <div class="col-sm-8">
                        <select class="form-control" name="umoneda"  id="umoneda">
                         
                        </select>
                      </div>
                  </div>
           </div>

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Categoría </label>
                      <div class="col-sm-8">
                        <select class="form-control" id="ucategoria" name="ucategoria" >  
                        </select>
                      </div>
                  </div>
           </div>

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="uestado">
                          <option value="">--[ Seleecione ]--</option>
                          <option value="0">Inactivo</option>
                          <option value="1">Activo</option>
                        </select>
                      </div>
                  </div>
           </div>    

           
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Unidades </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="uunidad">
                        
                        </select>
                      </div>
                  </div>
           </div>
 
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">N°ro Lote </label>
                    <div class="col-sm-8">
                      <input type="text" class="form-control" id="ulote"   maxlength="20">
                    </div>
                  </div>
           </div>
           
           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Bien </label>
                      <div class="col-sm-8">
                      <select class="form-control"  id="ubien">
                          <option value="">--[ Seleecione ]--</option>
                          <option value="0">Bienes</option>
                          <option value="1">Servicios</option>
                        </select>
                      </div>
                  </div>
           </div>   

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Impuesto </label>
                      <div class="col-sm-8">
                        <select class="form-control"  id="uimpuesto" >
                          <option  value="">--[ Seleecione ]--</option>
                          <option value="0">NoAfecto</option>
                          <option value="1">Afecto</option>
                         
                        </select>
                      </div>
                  </div>
           </div> 

           <div class="col-md-6">
                   <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Descripción </label>
                    <div class="col-sm-8">
                      <textarea  id="udescripcion" class="form-control"></textarea>
                    </div>
                  </div>
           </div>


        </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a onclick= "actualizar_producto();" class="btn btn-primary" href="#">Actualizar producto</a>
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