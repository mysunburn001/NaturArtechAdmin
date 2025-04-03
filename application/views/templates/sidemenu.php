<!-- ========== Left Sidebar Start ========== -->

            <?php $rol = ($this->session->userdata('tipo_user'));

            echo "<script languaje='JavaScript'>
                
                $( document ).ready(function() {
                var roles= '$rol';

                switch(roles) {

                    case 'SU':

                        break;
                        
                    case 'A':

                        
                    
                        break;

                    case 'E':


                    break;
                        
                }
                
            });
                             
            </script>";
            ?>
        
            <div class="left side-menu" id="master" >
                <div class="sidebar-inner slimscrollleft">
                    <!--- Divider -->
                    <div id="sidebar-menu" >
                        <ul id="todo">
                            <li class="text-muted menu-title">Menu</li>

                            <li class="has_sub" id="home">
                                <a href="<?= base_url('index.php/Dashboard/');?>" class="waves-effect waves-light" id="clickhome"><i class="fa fa-bank "></i><span>Inicio</span> </a>
                            </li>

                            <!--<li class="has_sub" id="citas">
                                <a href="<?= base_url('index.php/Citas/');?>" class="waves-effect waves-light" id="clickdates"><i class="fa fa-calendar "></i><span>Citas</span> </a>
                            </li>-->

                            <li class="has_sub" id="productos">
                                <a href="<?= base_url('index.php/Productos/');?>" class="waves-effect waves-light" id="clickproduct"><i class="fa fa-industry "></i><span>Productos</span> </a>
                            </li>

                            <li class="has_sub" id="categorias">
                                <a href="<?= base_url('index.php/Categorias/');?>" class="waves-effect waves-light" id="clickcategory"><i class="fa fa-list-ul "></i><span>Categorias</span> </a>
                            </li>

                            <li class="has_sub" id="reports">
                                <a href="#" class="waves-effect waves-light" ><i class="glyphicon glyphicon-list-alt"></i><span class=" fa fa-unsorted pull-right"></span><span>Reportes </span></a>

                                 <ul class="list-unstyled">
                                    
                                    <li id="report1">
                                        <a href="<?= base_url('index.php/Reportes/Reporte1');?>" >
                                        <i class="md md-people"></i>
                                        Reporte 1</a>
                                    </li>  

                                </ul>
                            </li>

                            <li class="has_sub" id="clientes">
                                <a href="<?= base_url('index.php/Clientes/');?>" class="waves-effect waves-light" id="clickclients"><i class="fa fa-user "></i><span>Clientes</span> </a>
                            </li>

                            <li class="has_sub" id="usuarios">
                                <a href="<?= base_url('index.php/Usuarios/');?>" class="waves-effect waves-light" id="clickusers"><i class="fa fa-user "></i><span>Usuarios</span> </a>
                            </li>

                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
            <!-- Left Sidebar End -->