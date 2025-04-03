    <!-- Content Wrapper. Contains page content -->
     
     <?php
     /* Dependencias requeridas para el funcionamiento de la DataTable */
    /* ==============================================================
            <---  CSS TEMPLATE  --->
            ============================================================== */
    
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css');
            echo script_tag("assets/darktemplate/plugins/datatables/pdfmake.min.js");
            echo script_tag("assets/darktemplate/plugins/datatables/vfs_fonts.js");
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

        $('#FromDate').datepicker({
            firstDay: 1,
            autoclose: true,
            todayHighlight: true,
            format: 'yyyy/mm/dd'
          });


        $('#ToDate').datepicker({
            firstDay: 1,
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
                                  <h3 class="panel-title">Report 1</h3>
                              </div>
                              <div class="table-responsive">
                                <div class="panel-body">

                                  <div class="card-box">

                                      <div class="box-body">

                                        <!-- Panel beggins-->

                                        <div class="panel panel-border panel-info  col-lg-12">
                                          <div class="panel-heading">
                                            <h3 class="panel-title">Companies by Date</h3>
                                          </div>
                                          <div class="panel-body">

                                            <div align="left">

                                            <!-- form beggins -->

                                            <div class="form-group">
                                                <label for="FromDate">From</label>
                                                <br>
                                                <input type="text" class="form-control" id="FromDate" placeholder="yyyy/mm/dd " id="datepicker-autoclose" readonly="readonly">
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                            </div>

                                            <div class="form-group">
                                                <label for="ToDate">To</label>
                                                <br>
                                                <input type="text" class="form-control" id="ToDate" placeholder="yyyy/mm/dd " id="datepicker-autoclose" readonly="readonly">
                                              <span class="input-group-addon bg-custom b-0 text-white"><i class="icon-calender"></i></span>
                                            </div>

                                            <div class="form-group">
                                                <div id="PreloaderReport1" hidden="true" align="center">
                                                    
                                                    <img src="<?php echo base_url('assets/myapp/img/preloader.gif'); ?>" alt="validando...">
                                                </div>
                                            </div>

                                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onclick="Report1()" id="ButtonReport1">PDF</button> 

                                            
                                            <!-- form ends -->         
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