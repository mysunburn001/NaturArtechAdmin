    <!-- Content Wrapper. Contains page content -->
     
     <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            
    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
          
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
            $("#BotonEditaUsuario").hide();

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
                                  <h3 class="panel-title">Usuarios</h3>
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
                                                <label for="NombreUsuario">Nombre(s)</label>
                                                <br>
                                                <input type="text" id="IDOculto" hidden>
                                                <input type="text" name="NombreUsuario" placeholder="Nombre(s)" id="NombreUsuario" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="ApPaternoUsuario">Apellido Paterno</label>
                                                <br>
                                                <input type="text" name="ApPaternoUsuario" placeholder="Apellido Paterno" id="ApPaternoUsuario" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="ApMaternoUsuario">Apellido Materno</label>
                                                <br>
                                                <input type="text" name="ApMaternoUsuario" placeholder="Apellido Materno" id="ApMaternoUsuario" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="TelefonoUsuario">Telefono</label>
                                                <br>
                                                <input type="text" name="TelefonoUsuario" placeholder="Telefono" id="TelefonoUsuario" class="form-control" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;" onblur="RevisaTelefonoUsuario()">
                                            </div>

                                            <div class="form-group">
                                                <label for="CorreoUsuario">Correo</label>
                                                <br>
                                                <input type="text" name="CorreoUsuario" placeholder="Correo" id="CorreoUsuario" class="form-control" onblur="RevisaCorreoUsuario()">
                                            </div>

                                            <div class="form-group">
                                                <label for="NUsuario">Usuario</label>
                                                <br>
                                                <input type="text" name="NUsuario" placeholder="Usuario" id="NUsuario" class="form-control" onblur="RevisaUsuarioExistenteS()">
                                            </div>

                                            <div class="form-group">
                                                <label for="PasswordUsuario">Password</label>
                                                <br>
                                                <input type="password" name="PasswordUsuario" placeholder="Contraseña" id="PasswordUsuario" class="form-control">
                                            </div>

                                            <div class="form-group">
                                              <label for="RolUsuario">Rol</label>
                                              <select id="RolUsuario" name="RolUsuario" class="form-control">
                                                <option value="" >Elije Rol</option>
                                             
                                                <option value="A">Administrador</option>
                                                <option value="E">Empleado</option>
                     
                                              </select>
                                            </div>

                                             <div class="form-group" id="EstadoEscondido">
                                                  <label for="EstadoUsuario">Estado</label>
                                                  <select id="EstadoUsuario" name="EstadoUsuario" class="form-control">
                                                  <option value="" >Elije Estado</option>
                                                    
                                                    <option value="1"> Activo</option>
                                                    <option value="0"> Inactivo </option>
                                                  

                                                  </select>
                                            </div>

                                            <div class="form-group">
                                                <div id="PreloaderUsuario" hidden="true" align="center">
                                                    
                                                    <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="VerificaContenidoUsuario()" id="BotonGuardaUsuario">Guardar</button> 

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="EditaUsuarioS()" id="BotonEditaUsuario">Editar</button> 
                                            
                                            <!-- form ends -->         
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel ends-->

                                <!-- Panel beggins-->

                                <div class="col-lg-8">
                                  <div class="panel panel-border panel-info">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Lista Usuarios</h3>
                                      </div>
                                      <div class="table-responsive">
                                        <div class="panel-body">
                                          <table id="datatable" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Telefono</th>
                                                <th>Correo</th>
                                                <th>Tipo</th>
                                                <th>Estado</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                             
                                              </tr>
                                            </thead>
                                            <tbody>                              
                                              
                                              <?php

                                              $values = count($usuarios);
                                              for ($i=0; $i < $values ; $i++) { 
                                                $res = $usuarios[$i];
                                                $id_usuario = $res -> id_usuario;
                                                $nombre = $res -> nombre;
                                                $apaterno = $res -> apaterno;
                                                $amaterno = $res -> amaterno;
                                                $telefono = $res -> telefono;
                                                $email = $res -> email; 
                                                $ocupacion = $res -> ocupacion; 
                                                $estado = $res -> estado;

                                                $nombre_completo = $nombre .' ' .$apaterno. ' ' .$amaterno; 

                                                echo "
                                                <tr>
                                                  <td>$nombre_completo</td>
                                                  <td>$telefono</td>
                                                  <td>$email</td>
                                                  <td>$ocupacion</td>";

                                                  if ($estado == 1) {
                                                    echo "<td><span class='label label-success'>Activo</span></td>";
                                                  }else{
                                                    echo "<td><span class='label label-danger'>Inactivo</span></td>";
                                                  }

                                                  echo "<td>";
                                                  echo "<a href='#' id='Edit' onclick='ConsultaDatosUsuarioS($id_usuario)'><i class='fa fa-pencil'></i> </a>
                                                  </td>";

                                                  echo "<td>";
                                                  echo "<a href='#' id='Delete' onclick='BorraUsuarioS($id_usuario)'><i class='md md-close'></i> </a>
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