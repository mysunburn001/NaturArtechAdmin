
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
            $("#BotonEditaCategoria").hide();

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
                                  <h3 class="panel-title">Categorias</h3>
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
                                                <label for="NombreCategoria">Nombre</label>
                                                <br>
                                                <input type="text" id="IDOculto" hidden>
                                                <input type="text" id="FechaRegistro" hidden>
                                                <input type="text" id="UsuarioRegistro" hidden>
                                                <input type="text" name="NombreCategoria" placeholder="Nombre" id="NombreCategoria" class="form-control">
                                            </div>

                                            <div class="form-group">
                                                <label for="DescripcionCategoria">Descripcion</label>
                                                <br>
                                                <input type="text" name="DescripcionCategoria" placeholder="Descripcion" id="DescripcionCategoria" class="form-control">
                                            </div>

                                             <div class="form-group" id="EstadoEscondido">
                                                  <label for="EstadoCategoria">Estado</label>
                                                  <select id="EstadoCategoria" name="EstadoCategoria" class="form-control">
                                                  <option value="" >Elije Estado</option>
                                                    
                                                    <option value="1"> Activo </option>
                                                    <option value="0"> Inactivo </option>
                                                  

                                                  </select>
                                            </div>

                                            <div class="form-group">
                                                <div id="PreloaderCategoria" hidden="true" align="center">
                                                    
                                                    <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="VerificaContenidoCategoria()" id="BotonGuardaCategoria">Guardar</button> 

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="EditaCategoriaS()" id="BotonEditaCategoria">Editar</button> 
                                            
                                            <!-- form ends -->         
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel ends-->

                                <!-- Panel beggins-->

                                <div class="col-lg-8">
                                  <div class="panel panel-border panel-info">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Lista Categorias</h3>
                                      </div>
                                      <div class="table-responsive">
                                        <div class="panel-body">
                                          <table id="datatable" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Estado</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                             
                                              </tr>
                                            </thead>
                                            <tbody>                              
                                              
                                              <?php

                                              $values = count($categorias);
                                              for ($i=0; $i < $values ; $i++) { 
                                                $res = $categorias[$i];
                                                $id_categoria = $res -> id_categoria;
                                                $nombre = $res -> nombre;
                                                $descripcion = $res -> descripcion;
                                                $estado = $res -> estado;

                                                echo "
                                                <tr>
                                                  <td>$nombre</td>
                                                  <td>$descripcion</td>";

                                                  if ($estado == 1) {
                                                    echo "<td><span class='label label-success'>Activo</span></td>";
                                                  }else{
                                                    echo "<td><span class='label label-danger'>Inactivo</span></td>";
                                                  }

                                                  echo "<td>";
                                                  echo "<a href='#' id='Edit' onclick='ConsultaDatosCategoriaS($id_categoria)'><i class='fa fa-pencil'></i> </a>
                                                  </td>";

                                                  echo "<td>";
                                                  echo "<a href='#' id='Delete' onclick='BorraCategoriaS($id_categoria)'><i class='md md-close'></i> </a>
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