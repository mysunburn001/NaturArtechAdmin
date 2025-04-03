<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Citas extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "NaturArtech - Citas";
        $data['pagecontent'] = "citas/citas";
        $data['artistas'] = $this->Query_Model->ListaArtistasActivas();
        $data['clientes'] = $this->Query_Model->ListaClientesActivos();
        $data['productos'] = $this->Query_Model->ListaProductosActivos();
        
        $this->loadpageintotemplate($data);
       
   }

   public function GuardaErrorDCiC(){

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

   public function DatosArtista(){

        $IdArtista = $this->input->post("IdArtista");
        $Resultado = $this->Query_Model->SeleccionaUsuarioPorID($IdArtista);
        echo json_encode($Resultado);
   }

   public function Calendario(){

    $IdArtista = $this->input->post("IdArtista");
    $FechaIni = $this->input->post("FechaIni");
    $FechaFin = $this->input->post("FechaFin");

    $Tempo = new DateTime($FechaIni);
    $Año = $Tempo->format("Y");

    $Resultado = $this->Query_Model->InfoCitas($IdArtista,$FechaIni,$FechaFin,$Año);
    echo json_encode($Resultado);
   }

}
