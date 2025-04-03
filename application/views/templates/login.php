<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <!meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="description" content="Sistema de Administracion">
        <meta name="author" content="Daniel Alexis Martinez Sosa">

        <link rel="shortcut icon" href="<?php echo base_url('assets/myapp/img/favicon.png'); ?>">
        <title><?= $tabTitle; ?></title>

        <?php
        /* Dependencias requeridas para el funcionamiento del LOGIN */
        /* ==============================================================
                <---  CSS TEMPLATE  --->
           ============================================================== */
            echo link_tag('assets/darktemplate/css/bootstrap.min.css');
            echo link_tag('assets/darktemplate/css/core.css');
            echo link_tag('assets/darktemplate/css/components.css');
            echo link_tag('assets/darktemplate/css/icons.css');
            echo link_tag('assets/darktemplate/css/pages.css');
            echo link_tag('assets/darktemplate/css/responsive.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.css');
            echo link_tag('assets/darktemplate/plugins/bootstrap-datepicker/css/bootstrap-datepicker.min.css');

        /* ==============================================================
                <---  JS TEMPLATE  --->
           ============================================================== */
            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/js/jquery.min.js");
            echo script_tag("assets/darktemplate/js/bootstrap.min.js");
            echo script_tag('assets/darktemplate/js/fastclick.js');
            echo script_tag("assets/darktemplate/plugins/bootstrap-sweetalert/sweet-alert.js");
            echo script_tag("assets/darktemplate/pages/jquery.sweet-alert.init.js");
            echo script_tag("assets/darktemplate/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js");
            
        /* ==============================================================
                <---  JS MYAPP  --->
           ============================================================== */
            echo script_tag("assets/myapp/js/MY_Functions.js");
        ?>
        
        <script type="text/javascript">
            //var resizefunc = [];
            var myBase_url = '<?php echo base_url();?>';

            $(document ).ready(function() {

                window.location.hash="no-back-button";
                window.location.hash="Again-No-back-button" //chrome
                window.onhashchange=function(){window.location.hash="no-back-button";}
              
            });

        </script>

    </head>

    <body>
        <div class="account-pages"></div>
        <div class="clearfix"></div>
        <div class="wrapper-page" >
            <div class=" card-box" id="lo">
                <div class="panel-heading">
                    <div align="center"><img src="<?php echo base_url("assets/myapp/img/logo.jpeg") ?>" width="80%" height="80%" style= "border-radius: 100%"><br></div>
                    <h2 class="text-center"> <strong class="text-black"></strong> </h2>
                </div> 
                <div class="panel-body" >

                    <!--Tab Login-->

                    <div id="LoginTab">

                        <div class="form-group ">  
                            <input class="form-control" type="text" id="Usuario" placeholder="Usuario">
                        </div>

                        <div class="form-group">
                            <input class="form-control" type="password"  id="Password" placeholder="Password">
                        </div>  

                        <div id="PreloaderLogin" hidden="true" align="center">
                            <img src="<?php echo base_url('assets/myapp/img/preloader2.gif'); ?>" alt="validando...">
                        </div>
                              
                        <div class="form-group">
                            <button onClick="ValidateUserLogin();" class="btn btn-primary btn-block text-uppercase waves-effect waves-light" id="BotonLogin">Login</button>
                        </div>
              
                        <div class="form-group">
                            <button class="btn btn-primary btn-block text-uppercase waves-effect waves-light" onClick="ResetUserLogin();" id="BotonReset">Resetea Sesion</button>
                        </div>
                      
                    </div>

                    <div align="right">
                        <p>v1.0</p>
                    </div> 
                        
                </div>   
            </div>            
        </div>
    </body>
</html>


   