<?php $this->load->view($header); // aqui van los css y los modulos ?> 

    <div id="content-wrapper">

      <div class="container-fluid">

        <!-- Breadcrumbs-->
        <ol class="breadcrumb ">
          <li class="breadcrumb-item">
            <a href="#">Principal</a>
          </li>
          <li class="breadcrumb-item active">Proveedores</li>
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
           
           <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdproveedor" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Proveedor</button>
          </div>
          <div class="card-body ">
            <div class="table-responsive">
              <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>N°</th>
                    <th>Nombre</th>
                    <th>Documento</th>
                    <th>Tipo</th>                    
                    <th>Telefono</th>                    
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
  
                <tbody >
                <?php $cont=1; foreach ($proveedor as $item) { ?>  
                  <tr >
                     <td><?= $cont++; ?></td>
                     <td><?= $item->nom_emp; ?></td>
                     <td><?= $item->ruc_nif; ?></td>
                     <td><?= $item->tip_doc; ?></td>                                                                                 
                     <td><?= $item->telf_emp; ?></td>                                              
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
                            <button title="ELIMINAR PROVEEDOR" onclick="eliminar_proveedor('<?= $item->id_proveedor ?>');" class="btn btn-danger" > <i class="fas fa-trash "></i></button>                          
                            <button title="EDITAR PROVEEDOR" onclick="actualizar_proveedor('<?= $item->id_proveedor ?>','<?=$item->nom_emp ?>','<?=$item->tip_doc ?>','<?=$item->ruc_nif ?>','<?=$item->estado ?>');"  data-toggle="modal" data-target="#modaleditarproveedor"  class="btn btn-warning"> <i class="fas fa-edit "></i></button> 
                            <button data-toggle="modal" data-target="#modulosper" onclick="detalle_proveedor(<?= $item->id_proveedor ?>);"   class="btn btn-info btn-sm"> <i class=" fas fa-eye "></i></button>
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
<div class="modal fade" id="modaladdproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Agregar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">                                                       
            <!-- formulario -->
            <div class="row">

            <div class="col-md-10 offset-md-1">
                    <!-- <span class="anchor" id="formComplex"></span> -->
                    <!-- <hr class="my-5"> -->
                   <!--  <h3>Complex Form Example </h3> -->
                    
                    <!-- form complex example -->
                    <div class="form-row mt-4">
                        <div class="col-sm-12 pb-3">
                            <label for="nomemp">Nombre de empresa</label>
                            <div class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-user"></i></span></span></div>
                              <input type="text" class="form-control" id="nomemp" placeholder="Empresa o persona natural" required>
                            </div>                           
                        </div>
                        <div class="col-sm-5 pb-3">
                            <label for="tipdoc">Detalle de documento</label>
                            <!-- <select class="form-control chosen" id="tipdoc">                               
                            </select> -->
                            <div class="input-group">
                              <input type="text" class="form-control" name="tipodoc" id="tipodoc" onkeyup="busqueda(this.value);">                              
                              <!-- <span class="input-group-btn">
                                <button class="btn btn-primary" type="button">B</button>
                              </span> -->
                              <input type="hidden" name="tipdoc" id="tipdoc">  <!--ID QUE REPRESENTA CAMPO DE TEXTO LLENADO AUTOMATICO -->
                              <div id="data"></div>                                                          
                            </div>
                            <!-- <button data-toggle="modal"  data-toggle="modal" data-target="#modaladdproveedor" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Proveedor</button> -->
                        </div>
                        <div class="col-sm-3 pb-3">
                            <label for="tipdocid"> Tipo </label>
                            <input type="text" class="form-control" id="tipdocid" placeholder="" disabled>                            
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="numdoc">Número </label>
                            <div class="input-group">
                                <div class="input-group-prepend"><span class="input-group-text">#</span></span></div>
                                <input type="text" class="form-control" id="numdoc" placeholder="0000000" required>
                            </div>
                        </div> 
                        <div class="col-sm-10 pb-3">
                            <label for="diremp">Dirección </label>
                            <div class="input-group">
                              <div class="input-group-prepend"><span class="input-group-text"><i class="fas fa-edit"></i></span></span></div>
                              <input type="text" class="form-control" id="diremp" placeholder="Dirección de empresa">
                            </div>                           
                        </div>
                        <div class="col-sm-2 pb-3">
                            <label for="ubiemp"> Ubigeo </label>
                            <input type="text" class="form-control" id="ubiemp" placeholder="" disabled>
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="disemp">Distrito</label>                          
                            <input type="text" class="form-control divclick" name="disemp" id="disemp" onkeyup="buscadistri(this.value);">  
                            <!-- <input type="hidden" name="disempr" id="disempr"> ID QUE REPRESENTA CAMPO DE TEXTO LLENADO AUTOMATICO -->
                            <div id="datadis"></div>
                            <!--<select class="form-control" id="disemp">
                                <option>--[ seleccione Tipo ]--</option>
                            </select>                             -->
                        </div>                            
                        <div class="col-sm-4 pb-3">
                            <label for="proemp">Provincia</label>
                            <input type="text" class="form-control divclick" name="proemp" id="proemp" onkeyup="buscaprovi(this.value);"> 
                            <div id="datapro"></div> 
                            <!-- <input type="text" class="form-control" id="proemp" placeholder="" >                             -->
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="depemp">Departamento</label>  
                            <input type="text" class="form-control divclick" name="depemp" id="depemp" onkeyup="buscadepa(this.value);">  
                            <div id="datadep"></div>
                            <!-- <input type="text" class="form-control" id="depemp" placeholder="" >                                                      -->
                        </div>          
                        <div class="col-sm-4 pb-3">
                            <label for="telemp">Telefono</label>
                            <input type="text" class="form-control" id="telemp">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="celemp">Celular</label>
                            <input type="text" class="form-control" id="celemp">
                        </div>
                        <div class="col-sm-4 pb-3">
                            <label for="coremp">Correo</label>
                            <input type="text" class="form-control" id="coremp">
                        </div>                        
                        <div class="col-sm-8 pb-3">                            
                            <input type="text" class="form-control" id="nomcon" placeholder="Contacto 1">
                        </div>
                        <div class="col-sm-4 pb-3">                            
                            <input type="text" class="form-control" id="celcon" placeholder="Celular 1">
                        </div>   
                        <div class="col-sm-8 pb-3">                            
                            <input type="text" class="form-control" id="nomcon2" placeholder="Contacto 2">
                        </div>
                        <div class="col-sm-4 pb-3">                            
                            <input type="text" class="form-control" id="celcon2" placeholder="Celular 2">
                        </div>  

                        <div class="col-md-12 pb-3">
                            <label for="notemp">Notas</label>
                            <textarea class="form-control" id="notemp"></textarea>
                            <small class="text-info">
                              Observaciones o recordatorios del socio de negocio
                            </small>
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
        <button onclick="agregar_proveedor();" type="button" class="btn btn-primary">Guardar</button>
      </div>
    </div>
  </div>
</div>
  <!-- Modal Editar Tipodocs -->
  <div class="modal fade" id="modaleditarproveedor" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Editar Proveedor</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
                
            <!-- formulario -->
            <div class="row">                                                                  
            </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        <button onclick = "updateproveedor();" type="button" class="btn btn-primary">Guardar cambios</button>
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
