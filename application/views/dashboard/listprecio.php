<?php $this->load->view($header); // aqui van los css y los modulos ?> 




    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Lista precio</li>
        </ol>

  
        <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
       <canvas id="myAreaChart" height="0"  style="display: none;"></canvas> 
          
      
       
        <!-- DataTables Example rapido quiero ver mi novela-->
        <div class="card mb-3">
          <div class="card-header " style="background-color: #00a65a;">           
           <button data-toggle="modal" data-target="#modal_lista" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Lista Precio</button>
           <button data-toggle="modal" data-target="#modal_lista2" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar  Productos</button>
          </div> 
          <br>         
          <div class="form-group row " >        
              <div class="col-md-6  ">  
                <select name="sellispre" id="sellispre" class="custom-select" onchange="cargalistaprecio(this.value)">                  
                </select>  
              </div>                
              <div class="col-md-3 ">                  
              </div>              
                <!-- <label for="inputPassword" class="col-sm-8 col-form-label">Tipo Documento </label> -->
              <div class="col-sm-3">
              <input type="text" class="form-control" id="monlispre" style="background-color: lightgreen;font-weight: bold;">
                <!-- <label id="monlispre"></label> -->
              </div>              
            </div>            
          <div class="card-body ">
            <div class="table-responsive">                                                              
              <table class="table table-hover" id="tablaprecio" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>                                  
                    <th>Código</th>
                    <th>Descripción Item</th>
                    <th>Precio Base</th>
                    <th>Descuento</th>
                    <th>Precio Venta</th>                    
                    <th>Opciones</th>
                  </tr>
                </thead>
  
                <!--  <tbody >
                <?php $cont=1; foreach ($listprecio as $item) { ?>  
                  <tr >                                          
                     <td><?= $item->cod_item ?></td>
                     <td><?= $item->nom_item ?></td>
                     <td><?= $item->preciovta_base ?></td>
                     <td><?= $item->prc_dscto ?></td>
                     <td><?= $item->preciovta_fin ?></td>                     
                     <td class="text-center">
                        <div class="btn-group">
                        	<button class="btn btn-danger" > <i class="fas fa-trash "></i></button>
                            <button   data-toggle="modal" data-target="#editroles"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>                        	
                        </div>
                    </td>
                  </tr>
                <?php } ?>  
                </tbody> -->
              </table>
            </div>
          </div>          
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

<!--  Modal para añadir precio-->
<div class="modal fade" id="modal_lista2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar  precio</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
              
        <form id="form_roles">

        <div class="form-group row">
                <select name="" id="" class="col-md-4  form-control">
                <option value="">  [Selecciones lista Precio]</option>
                       <option value="">LISTA 1</option>
                       <option value="">LISTA 2</option>
                       </select>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Nombre producto</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>
            
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Precio Base</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>

            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label"> Moneda</label>
              <div class="col-sm-9">
                <select name="estad" id="estado" class="form-control">
                  <option value="">----[ Seleccione]----</option>
                <option value="1">PEN</option>
                <option value="2">YEN</option>
                </select>
                <input type="text" class="form-control" id="rol" name="rol"  >descuento

              </div>
            </div>
             
                          <!-- Formula:  PV = PB - DSCTO  ya-->
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Precio Venta</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>


	      </form>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_rol();">Agregar categoría</a>
        </div>
      </div>
    </div>
  </div>


  <!--  Modal para añadir lista de precio-->
  <div class="modal fade" id="modal_lista" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar lista de precio</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">                      
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Código</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>          
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Nombre</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label"> Estado</label>
              <div class="col-sm-9">
                <select name="estad" id="estado" class="form-control">
                  <option value="">----[ Seleccione]----</option>
                <option value="1" selected>Activo</option>
                <option value="2">Inactivo</option>
                </select>
              </div>
            </div>                       
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_listaprecio();">Agregar categoría</a>
        </div>
      </div>
    </div>
  </div>

  <!--  Modal para editar item de lista de precio-->
  <div class="modal fade" id="editalistaitem" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar lista de precio</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">                      
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Código</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol22" name="rol22"  >
              </div>
            </div>          
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label">Nombre</label>
              <div class="col-sm-9">
                <input type="text" class="form-control" id="rol" name="rol"  >
              </div>
            </div>
            <div class="form-group row">
              <label for="inputPassword" class="col-sm-3 col-form-label"> Estado</label>
              <div class="col-sm-9">
                <select name="estad" id="estado" class="form-control">
                  <option value="">----[ Seleccione]----</option>
                <option value="1" selected>Activo</option>
                <option value="2">Inactivo</option>
                </select>
              </div>
            </div>                       
        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a  class="btn btn-primary" href="#" onclick="agregar_listaprecio();">Agregar categoría</a>
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