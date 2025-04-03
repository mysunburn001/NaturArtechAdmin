<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categorias extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "NaturArtech - Categorias";
        $data['pagecontent'] = "categorias/categorias";
        $data['categorias'] = $this->Query_Model->ListaCategorias();
        
        $this->loadpageintotemplate($data);
       
   }

   function GuardaCambioCC(){

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

   function GuardaErrorCC(){

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

   public function GuardaCategoriaC(){

        $NombreCategoria = $this->input->post("NombreCategoria");
        $DescripcionCategoria = $this->input->post("DescripcionCategoria");
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');
        $Usuario = $this->session->userdata('user');
        
        $DatosCategoria = array(
            'nombre' => $NombreCategoria, 
            'descripcion' => $DescripcionCategoria, 
            'fecha_registro' => $FechaHoraActual, 
            'usuario_registro' => $Usuario, 
            'estado' => '1'
        );

        $this->Query_Model->InsertaCategoria($DatosCategoria);

   }

   public function ConsultaDatosCategoriaC(){

        $IDCategoria = $this->input->post("IDCategoria");
        $Resultado = $this->Query_Model->SeleccionaCategoriaPorID($IDCategoria);
        echo json_encode($Resultado);
   }

   public function EditaCategoriaC(){

        $IDCategoria = $this->input->post("IDCategoria");
        $NombreCategoria = $this->input->post("NombreCategoria");
        $DescripcionCategoria = $this->input->post("DescripcionCategoria");
        $FechaRegistro = $this->input->post("FechaRegistro");
        $Usuario = $this->input->post("UsuarioRegistro");
        $EstadoCategoria = $this->input->post("EstadoCategoria");

        $DatosCategoria = array(
            'nombre' => $NombreCategoria, 
            'descripcion' => $DescripcionCategoria, 
            'fecha_registro' => $FechaRegistro, 
            'usuario_registro' => $Usuario, 
            'estado' => $EstadoCategoria
        );

        $this->Query_Model->ActualizaCategoria($DatosCategoria,$IDCategoria);
       
   }

   public function BorraCategoriaC(){

        $IDCategoria = $this->input->post("IDCategoria");
        $this->Query_Model->BorraCategoriaBD($IDCategoria);
        $Resultado = $this->Query_Model->SeleccionaCategoriaPorID($IDCategoria);
        $NombreCategoria = $Resultado[0] -> nombre;
        echo json_encode($NombreCategoria);
   }

}
