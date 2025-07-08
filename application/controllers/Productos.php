<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "NaturArtech - Productos";
        $data['pagecontent'] = "productos/productos";
        $data['productos'] = $this->Query_Model->ListaProductos();
        $data['categorias'] = $this->Query_Model->ListaCategoriasActivas();
        
        $this->loadpageintotemplate($data);
       
   }

    function GuardaCambioPC(){

        $Cambio = $this->input->post("Cambio");
        $Origen = $this->input->post("Origen");
        $Contenido = $this->input->post("Contenido");
        $Usuario = $this->session->userdata('user');
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');
    
        $DatosCambio = array(
            'cambio' => $Cambio, 
            'origen' => $Origen, 
            'contenido' => $Contenido,
            'usuario' => $Usuario,
            'fecha_cambio' => $FechaHoraActual,
        );
    
        $this->Query_Model->InsertaCambio($DatosCambio);
   }

    function GuardaErrorPC(){

        $CodigoError = $this->input->post("CodigoError");
        $DescripcionError = $this->input->post("DescripcionError");
        $Origen = $this->input->post("Origen");
        $Usuario = $this->session->userdata('user');
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');

        $DatosError = array(
            'codigo' => $CodigoError, 
            'descripcion' => $DescripcionError, 
            'origen' => $Origen, 
            'usuario' => $Usuario,
            'fecha_error' => $FechaHoraActual,
        );

        $this->Query_Model->InsertaError($DatosError);
    }

    public function GuardaProductoC(){

        //print_r($_POST);
        //print_r($_FILES);

        $NombreProducto = $_POST["NombreProducto"];
        $DescripcionProducto = $_POST["DescripcionProducto"];
        $ClaveProducto = uniqid();
        $PrecioProducto = $_POST["PrecioProducto"];
        $CategoriaProducto = $_POST["CategoriaProducto"];
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');
        $Usuario = $this->session->userdata('user');
        $Extension;
        $Nombre_File;
        $Nombre_File_Ext;

        $this->load->library('upload');
    
        $Nombre_File = 'Ficha_Tecnica_de' . '_' . $NombreProducto;
        
        if ($_FILES["CapturaArchivo"]["type"] == "application/pdf") {
            
            $Extension = ".pdf";
        
        }elseif ($_FILES["CapturaArchivo"]["type"] == "application/msword") {
            
            $Extension = ".doc";

        }else{

            $Extension = ".docx";

        }

        $Nombre_File_Ext = $Nombre_File.'_'.$ClaveProducto.$Extension;
        
        $config['file_name'] = $Nombre_File;
        $config['upload_path'] = '/home/ez8la22yqbqh/public_html/FilesN/';
        $config['allowed_types'] = 'pdf|docx|doc';
        $config['max_size'] = 1024 * 8;
        //$config['encrypt_name'] = TRUE;
        $config['overwrite'] = TRUE; 

        $this->upload->initialize($config);

        //Upload file
        if( ! $this->upload->do_upload("CapturaArchivo")){

            //echo the errors
            echo $this->upload->display_errors();
        }

        //If the upload success
        //$file_name = $this->upload->file_name;
        //echo $file_name;

        $Nombre_Imagen = 'Imagen' . '_' . $NombreProducto . '_' . $ClaveProducto;
        $Nombre_Imagen_Ext = $Nombre_Imagen. '.jpg';
        
        $configImagen['file_name'] = $Nombre_Imagen;
        $configImagen['upload_path'] = '/home/ez8la22yqbqh/public_html/ImagesN/';
        $configImagen['allowed_types'] = 'jpg|jpeg';
        $configImagen['max_size'] = 1024 * 8;
        //$config['encrypt_name'] = TRUE;
        $configImagen['overwrite'] = TRUE; 

        $this->upload->initialize($configImagen);

        //Upload file
        if( ! $this->upload->do_upload("CapturaImagen")){

            //echo the errors
            echo $this->upload->display_errors();
        }
    
        $DatosProducto = array(
            'nombre' => $NombreProducto, 
            'descripcion' => $DescripcionProducto, 
            'clave' => $ClaveProducto, 
            'precio' => $PrecioProducto, 
            'categoria' => $CategoriaProducto, 
            'nombre_archivo' => $Nombre_File_Ext, 
            'nombre_imagen' => $Nombre_Imagen_Ext, 
            'fecha_registro' => $FechaHoraActual, 
            'usuario_registro' => $Usuario, 
            'estado' => '1'
        );

        $this->Query_Model->InsertaProducto($DatosProducto);

   }

    public function ConsultaDatosProductoC(){

        $IDProducto = $this->input->post("IDProducto");
        $Resultado = $this->Query_Model->SeleccionaProductoPorID($IDProducto);
        echo json_encode($Resultado);
   }

    public function EditaProductoC(){

        $IDProducto = $this->input->post("IDProducto");
        $NombreProducto = $this->input->post("NombreProducto");
        $DescripcionProducto = $this->input->post("DescripcionProducto");
        $ClaveProducto = $this->input->post("ClaveProducto");
        $PrecioProducto = $this->input->post("PrecioProducto");
        $CategoriaProducto = $this->input->post("CategoriaProducto");
        $FechaHoraActual = $this->input->post("FechaRegistro");
        $Usuario = $this->input->post("UsuarioRegistro");
        $EstadoProducto = $this->input->post("EstadoProducto");

        $DatosProducto = array(
            'nombre' => $NombreProducto, 
            'descripcion' => $DescripcionProducto, 
            'clave' => $ClaveProducto, 
            'precio' => $PrecioProducto, 
            'categoria' => $CategoriaProducto, 
            'fecha_registro' => $FechaHoraActual, 
            'usuario_registro' => $Usuario, 
            'estado' => $EstadoProducto
        );

        $this->Query_Model->ActualizaProducto($DatosProducto,$IDProducto);
       
   }

    public function BorraProductoC(){

        $IDProducto = $this->input->post("IDProducto");
        $this->Query_Model->BorraProductoBD($IDProducto);
        $Resultado = $this->Query_Model->SeleccionaProductoPorID($IDProducto);
        $ClaveProducto = $Resultado[0] -> clave;
        echo json_encode($ClaveProducto);
   }

}
