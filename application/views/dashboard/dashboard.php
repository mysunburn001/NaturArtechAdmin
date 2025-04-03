    <!-- Content Wrapper. Contains page content -->
     
    <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/fullcalendar/css/main.css');
            
    /* ==============================================================
            <---  JS TEMPLATE  --->
            ============================================================== */

            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
            echo script_tag("assets/darktemplate/plugins/fullcalendar/js/main.js");
            echo script_tag("assets/darktemplate/plugins/fullcalendar/locale/es.js");
        
          
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

        });


        document.addEventListener('DOMContentLoaded', function() {
          var calendarEl = document.getElementById('calendar');

          var calendar = new FullCalendar.Calendar(calendarEl, {
            //selectable: true,
            locale: 'es',
            headerToolbar: {
              left: 'prev,next today',
              center: 'title',
              right: ''
            },
            dateClick: function(info) {
              //alert('clicked ' + info.dateStr);
              RellenaDatosDiaMes(info.dateStr);
            },
            /*select: function(info) {
              alert('selected ' + info.startStr + ' to ' + info.endStr);
            }*/
          });

          calendar.render();
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
                                <h4 class="page-title">NaturArtech - Inicio</h4>
                               
                            </div>
                        </div>

                        <br>

                        <!-- Inicia modal content -->
                          <div id="custom-width-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="custom-width-modalLabel" aria-hidden="true" style="display: none;">
                            <div class="modal-dialog">
                               <div class="modal-content">
                                <div class="modal-header">
                                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>
                                  <h4 class="modal-title" id="custom-width-modalLabel"></h4>
                                </div>
                                <div class="modal-body table-responsive">

                                <h1>Citas del dia</h1>
                                
                                  <table id="datatable" class="table table-striped table-bordered table-responsive">
                                    <thead>
                                      <tr>
                                        <th>Clienta</th>
                                        <th>Artista</th>
                                        <th>Hora</th>
                                        <th>Servicio</th>
                                        <th>Estado</Em></th>

                                      </tr>
                                    </thead>
                                    <tbody id="tablahorarios"> 


                                    </tbody>
                                  </table>
                                  
                                </div>
                                <div class="modal-footer">
                                
                                    <button type="button" id="atras" class="btn btn-primary btn-custom waves-effect waves-light" data-dismiss="modal">Regresar</button>                                                                              
                                </div>
                              </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                          </div><!-- /.modal -->

                         <div class="col-lg-12">
                          <div class="panel panel-border panel-info">
                              <div class="panel-heading">
                                  <h3 class="panel-title" id="mes"></h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">

                                    <div class="row col-lg-12" id="calendario">
                                        <div class="card-box">
                                          <div class="table-responsive">                                            
                                                <div id='calendar'></div>
                                            </div>
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