<?php $this->load->view($header); 
?>


<div id="content-wrapper">

  <div class="container-fluid">

    <!-- Breadcrumbs-->
    <ol class="breadcrumb ">
      <li class="breadcrumb-item">
        <a href="#">Administración</a>
      </li>
      <li class="breadcrumb-item active">Usuarios</li>
    </ol>


    <!-- Area Chart Example ponle asi para que no joda ya que depende del chart asi que mejor dejalo asi-->
    <canvas id="myAreaChart" height="0" style="display: none;"></canvas>


    <div class="alert alert-success" role="alert" id="borradocat">
      <label for="">Se Elimino usuario correctamente!</label>
    </div>
    <!-- DataTables Example -->
    <div class="card mb-3">
      <div class="card-header " style=" background-color: #00a65a;">
        <button data-toggle="modal" data-target="#logoutModal2" class="btn btn-warning"><i class="fas fa-plus "></i> Agregar Usuario</button>
      </div>
      <div class="card-body ">
        <div class="table-responsive">
          <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
            <thead class=" bg-primary " style="color: #fff">
              <tr>
                <th>N°ro</th>
                <th>Usuario</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Tipo Usuario</th>
                <th>Estado</th>
                <th>Opciones</th>
              </tr>
            </thead>

            <tbody>
              <!-- <?php $cont = 1;
                    foreach ($userload as $item) { ?>   -->
                <tr>
                  <td><?= $cont++; ?></td>
                  <td><?= $item->username ?></td>
                  <td><?= $item->nombre . ' ' . $item->apellido ?></td>
                  <td><?= $item->email ?></td>
                  <td><?= $item->nom_tipo ?></td>
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
                      <button title="ELIMINAR PRODUCTO" class="btn btn-danger"> <i class="fas fa-trash "></i></button>
                      <!-- <button data-toggle="modal" data-target="#logoutModal3" class="btn btn-warning"> <i class="fas fa-edit "></i> Editar</button> -->
                      <button title="EDITAR PRODUCTO" onclick=" edit_usuario(<?= $item->id_user ?>,'<?= $item->username ?>','<?= $item->nombre ?>','<?= $item->apellido ?>','<?= $item->email ?>','<?= $item->dni_nif?>','<?= $item->nom_tipo?>');"  data-toggle="modal" data-target="#logoutModal3"  class="btn btn-warning"> <i class="fas fa-edit "></i></button>
                    </div>
                  </td>
                </tr>
                <!-- <?php } ?>  -->
            </tbody>
          </table>
        </div>
      </div>
      <div class="card-footer small text-muted">11:59 PM</div>
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

<!--  Modal para editar Usuario-->
<div class="modal fade" id="logoutModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Editar Usuario <strong><span id="editusuario"></span></strong></h5>
				<button class="close" type="button" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">×</span>
				</button>
			</div>
			<div class="modal-body">
				<div class="alert alert-success" role="alert" id="editado">
					<label for="">Se edito correctamente!</label>
				</div>
				<input type="hidden" id="ide" name="ide">
					<div class="row">
						<!-- Revisado -->
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Nombre</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="editnombre">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Apellido</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="editapellido">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Documento</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="editnrodoc">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Correo</label>
								<div class="col-sm-8">
									<input type="email" class="form-control" id="editcorreo">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Contraseña</label>
								<div class="col-sm-8">
									<input type="text" class="form-control" id="editpasswd">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Nueva contraseña</label>
								<div class="col-sm-8">
									<input type="password" class="form-control" id="editnewpasswd">
								</div>
							</div>
						</div>
						<div class="col-md-6">
							<div class="form-group row">
								<label for="inputPassword" class="col-sm-3 col-form-label">Perfil</label>
								<div class="col-sm-8">
									<select class="custom-select" id="editperfil">
										<!-- <option selected>--[ seleccione Perfil ]--</option>
										<option value="1">Administrador</option>
										<option value="2">Empleado</option>
										<option value="3">Usuario de Venta</option>
										<option value="4">Logistica (compras)</option> -->
									</select>
								</div>
							</div>
						</div>
						<!-- OK -->
					</div>

					<div class="modal-footer">
						<button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
						<a class="btn btn-primary" href="#" onclick="editar_usuario()">Guardar cambios</a>
					</div>
				</div>
			</div>
		</div>
	</div>

  <!--  Modal para añadir Usuario-->
  <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo Usuario</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="alert alert-warning" role="alert" id="error">
            <label for="">No se permite valores vacio!</label>
          </div>
          <div class="alert alert-success" role="alert" id="correcto">
            <label for="">Se agregó correctamente!</label>
          </div>

          <div class="row">

            <div class="col-md-6">

              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Nombre*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nombre">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Apellido*</label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="apellido">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Documento </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="nrodoc">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Correo </label>
                <div class="col-sm-8">
                  <input type="email" class="form-control" id="correo">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Usuario * </label>
                <div class="col-sm-8">
                  <input type="text" class="form-control" id="usuario">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">contraseña* </label>
                <div class="col-sm-8">
                  <input type="password" class="form-control" id="passwd">
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group row">
                <label for="inputPassword" class="col-sm-3 col-form-label">Perfil * </label>
                <div class="col-sm-8">
                  <select class="custom-select" id="inputGroupSelect02" name="inputGroupSelect02">
                    
                  </select>
                </div>
              </div>
            </div>
          </div>

          <small id="passwordHelpBlock" class="form-text text-muted">
            ( * ) Dato necesario
          </small>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
            <a class="btn btn-primary" href="#" onclick="agregar_usuario();">Agregar Usuario</a>
          </div>
        </div>
      </div>
    </div>



    <!-- Logout Modal  -- No borrar -- modal de sessión-->
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


    <?php $this->load->view($footer); 
    ?>