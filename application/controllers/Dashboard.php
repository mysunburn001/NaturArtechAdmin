<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "NaturArtech - Home";
        $data['pagecontent'] = "dashboard/dashboard";
        
        $this->loadpageintotemplate($data);
       
   }

   public function GuardaErrorDC(){

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

}
