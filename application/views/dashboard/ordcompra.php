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
           
           <button data-toggle="modal" data-target="#logoutModal2" class="btn btn-warning"><i class="fa fa-cart-plus"></i> Agregar Nueva Compra</button>
          </div>
          <div class="card-body ">

           <div class="row">
              
             <div class="col-md-6">
               
                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Fecha de emisión. </label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" id="fecha_emi" >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Ruc cliente. </label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control"  >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Moneda. </label>
                  <div class="col-sm-4">
                    <select name="" id="" class="form-control">
                       <option value=""> [Seleccione] </option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Tipo Serie. </label>
                  <div class="col-sm-4">
                    <select name="" id="" class="form-control">
                    <option value="">[Seleccione]</option>
                    </select>
                  </div>
                  <div class="col-sm-4">
                  <input type="text" class="form-control"  >
                  </div>
                </div>

             </div>
             <div class="col-md-6">

               <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Fecha de vencimiento. </label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control" id="fecha_ven" >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Nombre cliente . </label>
                  <div class="col-sm-8">
                  <input type="text" class="form-control"  >
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Condición . </label>
                  <div class="col-sm-6">
                    <select name="" id="" class="form-control">
                    <option value="">[Seleccione]</option>
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label for="inputPassword" class="col-sm-4 col-form-label">Estado . </label>
                  <div class="col-sm-4">
                    <select name="" id="" class="form-control">
                    <option value="">[Seleccione]</option>
                    </select>
                  </div>
                </div>

               </div>

               

           </div>


            <div class="table">
              <table id="tablafactura"  class="table table-hover" width="100%" cellspacing="0" style=" TEXT-ALIGN: RIGHT;">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                    <th>CODIGO</th>  
                    <th>CANTIDAD</th>                               
                    <th>DESCRIPCION PRODUCTO</th>
                    <th>PRECIO UNIT.</th>
                    <th>PRECIO TOTAL	</th>
                  </tr>
                </thead>
                  
                <tbody >
                  
                </tbody>
                  <table class="table" width="100%" cellspacing="0" style=" TEXT-ALIGN: RIGHT;">
                  
                    <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td>SUBTOTAL $	</td>
                       <td> <input class="form-control" type="text" id="subtotal"> </td>
                       <td style="  width: 67px;"></td>
                    </tr>
                    <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td>IGV (18)% $	</td>
                       <td><input class="form-control" type="text" id="igv"></td>
                       <td style="  width: 67px;"></td>
                    </tr>
                    <tr>
                       <td></td>
                       <td></td>
                       <td></td>
                       <td>TOTAL $		</td>
                       <td><input class="form-control" type="text" id="total"></td>
                       <td style="  width: 67px;"></td>
                    </tr>
                  </table>
              </table>
               <div id="detalle">
                
                

              </div>
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



  <!--  Modal para añadir Compra-->
  <div class="modal fade" id="logoutModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Buscar Producto en el sistema.</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">

        <div class="table-responsive">
              <table id="compra" class="table table-bordered" width="100%" cellspacing="0">
                <thead class=" bg-primary " style="color: #fff">
                  <tr>
                
                    <th>Código</th>                       
                    <th>Producto</th>
                    <th>Cantidad</th>
                     <th>Precio</th>
                    <th>Agregar</th>
                  </tr>
                </thead>
  
              </table>
            </div>

        </div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Salir</button>
         
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