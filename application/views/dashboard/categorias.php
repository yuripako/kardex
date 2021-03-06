<?php $this->load->view($header); // aqui van los css y los modulos ?> 




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Categoría</li>
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
                    <th>Detalle</th>                    
                
                    <th>Familia</th>
                    
                    <th>Estado</th>
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($category as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td>
                     <button   data-toggle="collapse" href="#collapseExample<?=$cont?>" 
                     onclick="loadinfocat(<?= $item->id_fam ?>)" class="btn btn-info btn-sm"><i class="fas fa-plus "></i>
                     </button>
                    </td>
                     <td><?= $item->nom_fam ?><br>
                   
                     <div class="collapse" id="collapseExample<?=$cont?>">
                        <div class="card card-body">
                            <div class="info"></div>
                        </div>
                      </div>
                     <td>
                         <?php
                         if ($item->estadosubfam == '1') {
                           echo "<span class='badge badge-success'>Activo</span>";
                         }
                         if ($item->estadosubfam == '0') {
                            echo "<span class='badge badge-danger'>Inactivo</span>";
                          }                         
                         ?>                        
                    </td>
                    
                     <td class="text-center">
                        <div class="btn-group">
                        	<button onclick="eliminar_cat(<?= $item->id_cate ?>,<?= $item->id_fam ?>);" class="btn btn-danger" > <i class="fas fa-trash "></i></button>
                        	<button onclick="editar_cat(<?= $item->id_cate ?>,<?= $item->id_fam ?>,'<?= $item->nom_fam ?>','<?= $item->descripcion ?>','<?= $item->jerarquia ?>','<?= $item->estadosubfam ?>');"  data-toggle="modal" data-target="#logoutModal3"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                        	
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
            
             <input type="hidden" id="uidecat" name="uidecat">
             <input type="hidden" id="uidefam" name="uidefam">
             <!-- <form id="form_jerarquia"> -->
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Descripción</label>
                  <div class="col-sm-9">
                    <input type="text" class="form-control" id="ucategoria" name="ucategoria" >
                  </div>
                </div>
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Tipo</label>
                  <div class="col-sm-9">                  
                      <select class="custom-select disable" name="utipofam" id="utipofam">
                          <option selected>--[ seleccione estado ]--</option>
                          <option value="0">Familia</option>
                          <option selected value="1">SubFamilia</option>  
                      </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-3 col-form-label">Familia</label>
                  <div class="col-sm-9">
                      <select name="ujerarquia1" id="ujerarquia1" class="form-control"></select>
                      
                  </div>
                </div>                
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-3 col-form-label">Estado </label>
                    <div class="col-sm-9">
                      <select class="custom-select" id="uestadocat">
                          <option selected>--[ seleccione estado ]--</option>
                          <option value="1">Activo</option>
                          <option value="0">Inactivo</option>                        
                      </select>
                    </div>
                  </div>                
            <!-- </form> -->
        	 
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
          <h5 class="modal-title" id="exampleModalLabel">Agregar Nueva Familia de productos</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              
        <form id="form_jerarquia">
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Descripción</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="categoria" name="categoria" >
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Tipo</label>
              <div class="col-sm-9">                  
                  <select class="custom-select" name="tipofam" id="tipofam">
                      <option selected>--[ seleccione estado ]--</option>
                      <option value="0">Familia</option>
                      <option selected value="1">SubFamilia</option>  
                  </select>
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Familia</label>
              <div class="col-sm-9">
                  <select name="jerarquia1" id="jerarquia1" class="form-control"></select>
                  
              </div>
            </div>
	      </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_categoria();">Agregar Familia</a>
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