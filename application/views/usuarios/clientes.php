    <!-- Content Wrapper. Contains page content -->
     
    <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
            
    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
            echo script_tag("assets/darktemplate/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js");
          
    /* ==============================================================
            <---  JS MYAPP  --->
            ============================================================== */
             echo script_tag("assets/myapp/js/MY_Functions.js");
            ?>


<html>
    <head>
        <meta charset="utf-8">
        
    </head>

    <script>
        var resizefunc = [];

        $(document).ready(function() {

            $("#EstadoEscondido").hide();
            $("#BotonEditaCliente").hide();

            $('#FechaNCliente').datepicker({
              autoclose: true,
              todayHighlight: true,
              format: 'yyyy/mm/dd'
            });

        });

    </script>



    <body class="fixed-left">

        <!-- Begin page -->
        <div id="wrapper">

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->                      
            <div class="content-page">
                <!-- Start content -->
                <div class="content">
                    <div class="container">

                        <!-- Page-Title -->
                        <div class="row">
                            <div class="col-sm-12">
                                <h4 class="page-title"><?= $tabTitle; ?></h4>
                               
                            </div>
                        </div>

                        <br>

                        <!-- Content -->
                         <div class="col-lg-12">
                          <div class="panel panel-border panel-info">
                              <div class="panel-heading">
                                  <h3 class="panel-title">Clientes</h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">

                                  <div class="card-box">

                                      <div class="box-body">

                                        <!-- Panel beggins-->

                                        <div class="panel panel-border panel-info  col-lg-4">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Registro</h3>
                                          </div>
                                          <div class="panel-body">

                                            <div align="left">

                                            <!-- form beggins -->

                                            <div class="form-group">
                                                <label for="NombreCliente">Nombre(s)</label>
                                                <br>
                                                <input type="text" id="IDOculto" hidden>
                                                <input type="text" id="FechaRegistro" hidden>
                                                <input type="text" id="Codigo" hidden>
                                                <input type="text" name="NombreCliente" placeholder="Nombre(s)" id="NombreCliente" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="ApPaternoCliente">Apellido Paterno</label>
                                                <br>
                                                <input type="text" name="ApPaternoCliente" placeholder="Apellido Paterno" id="ApPaternoCliente" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="ApMaternoCliente">Apellido Materno</label>
                                                <br>
                                                <input type="text" name="ApMaternoCliente" placeholder="Apellido Materno" id="ApMaternoCliente" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="TelefonoCliente">Telefono</label>
                                                <br>
                                                <input type="text" name="TelefonoCliente" placeholder="Telefono" id="TelefonoCliente" class="form-control" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" onblur="RevisaTelefonoCliente()">
                                            </div>

                                            <div class="form-group">
                                                <label for="CorreoCliente">Correo</label>
                                                <br>
                                                <input type="text" name="CorreoCliente" placeholder="Correo" id="CorreoCliente" class="form-control" onblur="RevisaCorreoCliente()">
                                            </div>

                                            <div class="form-group">

                                              <label for="FechaNCliente">Fecha de Nacimiento</label>
                                              <input type="text" class="form-control" id="FechaNCliente" placeholder="yyyy/mm/dd " id="datepicker-autoclose">
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>

                                            </div>

                                             <div class="form-group" id="EstadoEscondido">
                                                  <label for="EstadoCliente">Estado</label>
                                                  <select id="EstadoCliente" name="EstadoCliente" class="form-control">
                                                  <option value="" >Elije Estado</option>
                                                    
                                                    <option value="1"> Activo</option>
                                                    <option value="0"> Inactivo </option>
                                                  

                                                  </select>
                                            </div>

                                            <div class="form-group">
                                                <div id="PreloaderCliente" hidden="true" align="center">
                                                    
                                                    <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="VerificaContenidoCliente()" id="BotonGuardaCliente">Guardar</button> 

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="EditaClienteS()" id="BotonEditaCliente">Editar</button> 
                                            
                                            <!-- form ends -->         
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel ends-->

                                <!-- Panel beggins-->

                                <div class="col-lg-8">
                                  <div class="panel panel-border panel-info">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Lista Clientes</h3>
                                      </div>
                                      <div class="table-responsive">
                                        <div class="panel-body">
                                          <table id="datatable" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Fecha de Nacimiento</th>
                                                <th># de Membresia</th>
                                                <th>Estado</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                             
                                              </tr>
                                            </thead>
                                            <tbody>                              
                                              
                                              <?php

                                              $values = count($clientes);
                                              for ($i=0; $i < $values ; $i++) { 
                                                $res = $clientes[$i];
                                                $id_cliente = $res -> id_cliente;
                                                $nombre = $res -> nombre;
                                                $apaterno = $res -> apaterno;
                                                $amaterno = $res -> amaterno;
                                                $telefono = $res -> telefono;
                                                $email = $res -> email; 
                                                $fechan_n = $res -> fecha_nacimiento; 
                                                $membreia = $res -> codigo; 
                                                $estado = $res -> estado;

                                                $nombre_completo = $nombre .' ' .$apaterno. ' ' .$amaterno; 

                                                echo "
                                                <tr>
                                                  <td>$nombre_completo</td>
                                                  <td>$telefono</td>
                                                  <td>$email</td>
                                                  <td>$fechan_n</td>
                                                  <td>$membreia</td>";

                                                  if ($estado == 1) {
                                                    echo "<td><span class='label label-success'>Activo</span></td>";
                                                  }else{
                                                    echo "<td><span class='label label-danger'>Inactivo</span></td>";
                                                  }

                                                  echo "<td>";
                                                  echo "<a href='#' id='Edit' onclick='ConsultaDatosClienteS($id_cliente)'><i class='fa fa-pencil'></i> </a>
                                                  </td>";

                                                  echo "<td>";
                                                  echo "<a href='#' id='Delete' onclick='BorraClienteS($id_cliente)'><i class='md md-close'></i> </a>
                                                  </td>";

                                              echo "</tr>";
                                              }
                                            ?>  

                                            </tbody>
                                          </table>
                                        </div>
                                      </div>
                                    </div>
                              </div>

                              <!-- Panel ends-->


                                        

                              </div>
                        </div>
                    
                    </div>
                  </div>
                </div>
            </div>

            </div> <!-- container -->                               
                </div> <!-- content -->

                <footer class="footer">
                     <?= date('Y')?> &copy; 
                </footer>

            </div>
            <!-- ============================================================== -->
            <!-- End Right content here -->
            <!-- ============================================================== -->



        </div>
        <!-- END wrapper -->

    </body>
</html>