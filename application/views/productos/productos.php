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

            echo script_tag("assets/darktemplate/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js");
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
            $("#BotonEditaProducto").hide();
            $("#ImagenProducto").hide();

        });

        function EncodeBase64() {
          const preview = document.querySelector('#ImagenProducto');
          const file = document.getElementById('CapturaImagen').files[0];
          const reader = new FileReader();

          reader.addEventListener("load", () => {
            // convert image file to base64 string
            preview.src = reader.result;
            var base64 = reader.result;
            $("#ImagenProducto").show();
          }, false);

          if (file) {
            reader.readAsDataURL(file);
          }
        }


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
                                  <h3 class="panel-title">Productos</h3>
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

                                            <form role="form" enctype="multipart/form-data" id="formProducto">

                                              <div class="form-group">
                                                  <label for="NombreProducto">Nombre</label>
                                                  <br>
                                                  <input type="text" id="IDOculto" hidden>
                                                  <input type="text" id="ClaveProducto" hidden>
                                                  <input type="text" id="FechaRegistro" hidden>
                                                  <input type="text" id="UsuarioRegistro" hidden>
                                                  <input type="text" name="NombreProducto" placeholder="Nombre" id="NombreProducto" class="form-control">
                                              </div>

                                              <div class="form-group">
                                                  <label for="DescripcionProducto">Descripcion</label>
                                                  <br>
                                                  <input type="text" name="DescripcionProducto" placeholder="Descripcion" id="DescripcionProducto" class="form-control">
                                              </div>

                                              <div class="form-group">
                                                  <label for="PrecioProducto">Precio</label>
                                                  <br>
                                                  <input type="text" name="PrecioProducto" placeholder="Precio" id="PrecioProducto" class="form-control" onKeyPress="if (event.keyCode < 48 || event.keyCode > 57)event.returnValue = false;">
                                              </div>
                                        
                                              <div class="form-group">       
                                                <label for="CategoriaProducto">Categoria</label>                                           
                                                <select id="CategoriaProducto" name="CategoriaProducto" class="form-control">
                                                  <option value="" >Elije Categoria</option>


                                                  <?php

                                                    $valores = count($categorias);
                                                    for ($i=0; $i < $valores ; $i++) { 
                                                      $res = $categorias[$i];
                                                      $id = $res -> id_categoria;
                                                      $nombre = $res -> nombre;

                                                      echo "<option value='$id'>$nombre</option>";
                                                    }
                                                    ?>
                                                                                  
                                                </select>
                                              </div> 
                                
                                              <div class="form-group" id="EstadoEscondido">
                                                    <label for="EstadoProducto">Estado</label>
                                                    <select id="EstadoProducto" name="EstadoProducto" class="form-control">
                                                    <option value="" >Elije Estado</option>
                                                      
                                                      <option value="1"> Activo </option>
                                                      <option value="0"> Inactivo </option>
                                                    

                                                    </select>
                                              </div>

                                              <div class="form-group">
                                                <label for="CapturaArchivo">Archivo</label>
                                                <input type="file" class="filestyle form-control" data-size="sm" accept=".pdf,.doc,.docx" name="CapturaArchivo" id="CapturaArchivo">
                                              </div>  

                                              <div class="form-group">
                                                  <label for="CapturaImagen">Imagen</label>
                                                  <input type="file" class="filestyle form-control" data-size="sm" accept=".jpg" name="CapturaImagen" id="CapturaImagen" onchange="EncodeBase64();">
                                              </div> 

                                              <img src="" height="250" width="250" id="ImagenProducto">

                                              <div class="form-group">
                                                  <div id="PreloaderProducto" hidden="true" align="center">
                                                      
                                                      <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                                                  </div>
                                              </div>
                                                                              
                                              <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="VerificaContenidoProducto()" id="BotonGuardaProducto">Guardar</button> 

                                              <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="EditaProductoS()" id="BotonEditaProducto">Editar</button> 
                                            
                                            </form>
                                            <!-- form ends -->         
                                        </div>
                                    </div>
                                </div>
                                <!-- Panel ends-->

                                <!-- Panel beggins-->

                                <div class="col-lg-8">
                                  <div class="panel panel-border panel-info">
                                      <div class="panel-heading">
                                          <h3 class="panel-title">Lista Productos</h3>
                                      </div>
                                      <div class="table-responsive">
                                        <div class="panel-body">
                                          <table id="datatable" class="table table-striped table-bordered table-responsive">
                                            <thead>
                                              <tr>
                                                <th>Nombre</th>
                                                <th>Descripcion</th>
                                                <th>Precio</th>
                                                <th>Imagen</th>
                                                <th>Archivo</th>
                                                <th>Estado</th>
                                                <th>Editar</th>
                                                <th>Borrar</th>
                                             
                                              </tr>
                                            </thead>
                                            <tbody>                              
                                              
                                              <?php

                                              $values = count($productos);
                                              for ($i=0; $i < $values ; $i++) { 
                                                $res = $productos[$i];
                                                $id_producto = $res -> id_producto;
                                                $nombre = $res -> nombre;
                                                $descripcion = $res -> descripcion;
                                                $precio = $res -> precio;
                                                $imagen = $res -> nombre_imagen;
                                                $nombre_doc = $res -> nombre_archivo;
                                                $estado = $res -> estado;

                                                $path = base_url("index.php/File/getdocument/$imagen");

                                                echo "
                                                <tr>
                                                  <td>$nombre</td>
                                                  <td>$descripcion</td>
                                                  <td>$precio</td>
                                                  <td align='center'><img src='$path' onmouseover='this.width=300;this.height=300;' onmouseout='this.width=100;this.height=80;' width='100' height='80' alt='fotoproducto'></td>
                                                  <td><a href='https://www.rehabilitacionneurologicaintegral.com.mx/FilesN/$nombre_doc'>$nombre_doc</a></td>";

                                                  

                                                  if ($estado == 1) {
                                                    echo "<td><span class='label label-success'>Activo</span></td>";
                                                  }else{
                                                    echo "<td><span class='label label-danger'>Inactivo</span></td>";
                                                  }

                                                  echo "<td>";
                                                  echo "<a href='#' id='Edit' onclick='ConsultaDatosProductoS($id_producto)'><i class='fa fa-pencil'></i> </a>
                                                  </td>";

                                                  echo "<td>";
                                                  echo "<a href='#' id='Delete' onclick='BorraProductoS($id_producto)'><i class='md md-close'></i> </a>
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