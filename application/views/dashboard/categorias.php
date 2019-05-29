<?php $this->load->view($header); // aqui van los css y los modulos ?> 




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">categoría</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
       
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal" data-target="#logoutModal2" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Familias</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>                    
                    <th>Familia</th>
                    <th>Subfamilia</th>
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($category as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td></td>
                     <td><?= $item->descripcion ?></td>
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
                        	<button onclick="eliminar_cat(<?= $item->id_cate ?>);" class="btn btn-danger" > <i class="fas fa-trash "></i></button>
                        	<button onclick=" editar_cat(<?= $item->id_cate ?>,'<?= $item->descripcion ?>');"  data-toggle="modal" data-target="#logoutModal3"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>
                        	
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


<!--  Modal para editar categoria-->
  <div class="modal fade" id="logoutModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar  categoría</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
  
            
             <input type="hidden" id="ide" name="ide">

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label"> categoría</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="categoria2" placeholder="">
			    </div>
			  </div>

			   <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label">Jerarquía</label>
			    <div class="col-sm-9">
			      <!-- <textarea id="descripcion2" class="form-control"></textarea> -->
            <select name="jerarquia" id="jerarquia"></select>
			    </div>
			  </div>

        
	 

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="edit_categoria()" >Editar categoría</a>
        </div>
      </div>
    </div>
  </div>

  <!--  Modal para añadir categoria-->
  <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nueva categoría</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              
        <form id="form_jerarquia">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label"> categoría</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="categoria" name="categoria" >
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Jerarquía</label>
              <div class="col-sm-9">
                  <select name="jerarquia1" id="jerarquia1" class="form-control"></select>
                  
              </div>
            </div>
	      </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_categoria();">Agregar categoría</a>
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