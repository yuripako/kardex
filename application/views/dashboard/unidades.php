<?php $this->load->view($header); // aqui van los css y los modulos ?> 




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">unidades</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
        <div class="alert alert-success" role="alert" id="borradouni_u">
			 	  <label for="">Se Elimino la unidad correctamente!</label>
		</div>
        <!-- DataTables Example -->
        <div class="card mb-3">
          <div class="card-header " style=" background-color: #00a65a;">
           
           <button data-toggle="modal" data-target="#logoutModal22" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar unidades</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°ro</th>
                    <th>Código</th>
                    <th>Nombre unidad</th>
                    <th>Descripción</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <tbody >
               
                   <?php $cont=1; foreach ($unidads as $item) { ?>
                  <tr>
                    <td><?= $cont++; ?></td>
                    <td><?= $item->cod_unid ?></td>
                    <td><?= $item->nom_unid ?></td>	
                    <td><?= $item->descripcion ?></td>
                    <td class="text-center">
                        <div class="btn-group">
                        	<button onclick="delete_uni('<?= $item->cod_unid ?>')" class="btn btn-danger" > <i class="fas fa-trash "></i> Eliminar</button>
                        	<button  onclick="editar_unid('<?= $item->cod_unid ?>', '<?= $item->nom_unid ?>', '<?= $item->descripcion ?>');" data-toggle="modal" data-target="#logoutModal33"  class="btn btn-warning"> <i class="fas fa-edit "></i> Editar</button>
                        	
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
      <footer class="sticky-footer">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright © Your Website 2019</span>
          </div>
        </div>
      </footer>

    </div>
    <!-- /.content-wrapper -->

  </div>
  <!-- /#wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>


<!--  Modal para editar categoria-->
  <div class="modal fade" id="logoutModal33" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar  unidades</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
            
			 <div class="alert alert-success" role="alert" id="editado">
			 	  <label for="">Se edito correctamente!</label>
			</div>
            
             <input type="hidden" id="ide" name="ide">

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label"  > Código</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="codigo3" disabled >
			    </div>
			  </div>
			   <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label"> Nombre</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="nombre3" >
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label">Descripción</label>
			    <div class="col-sm-9">
			      <textarea id="descripcion3" class="form-control"></textarea>
			    </div>
			  </div>
	 

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="edit_unidades()" >Editar categoría</a>
        </div>
      </div>
    </div>
  </div>



  <!--  Modal para añadir categoria-->
  <div class="modal fade" id="logoutModal22" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nueva unidad</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              <div class="alert alert-warning" role="alert" id="error_u">
				 <label for="">No se permite valores vacio!</label>
			   </div>
			 <div class="alert alert-success" role="alert" id="correcto_u">
			 	  <label for="">Se agregó correctamente!</label>
			</div>

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label"> Código</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="codigo" maxlength="4">
			    </div>
			  </div>
               
              <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label"> Nombre</label>
			    <div class="col-sm-9">
			      <input type="text" class="form-control" id="nombre" >
			    </div>
			  </div>

			  <div class="form-group row">
			    <label for="inputPassword" class="col-sm-3 col-form-label">Descripción</label>
			    <div class="col-sm-9">
			      <textarea id="descripcion" class="form-control"></textarea>
			    </div>
			  </div>
	 

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_unidad();">Agregar categoría</a>
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