<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function index(){
        $data['tabTitle'] = "NaturArtech - Clientes";
        $data['pagecontent'] = "usuarios/clientes";
        $data['clientes'] = $this->Query_Model->ListaClientes();
        
        $this->loadpageintotemplate($data);
       
    }

    function GuardaCambioCliC(){

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

    public function GuardaErrorCliC(){

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

   public function GuardaClienteC(){

        $NombreCliente = $this->input->post("NombreCliente");
        $ApPaternoCliente = $this->input->post("ApPaternoCliente");
        $ApMaternoCliente = $this->input->post("ApMaternoCliente");
        $TelefonoCliente = $this->input->post("TelefonoCliente");
        $CorreoCliente = $this->input->post("CorreoCliente");
        $FechaNCliente = $this->input->post("FechaNCliente");
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');
        $Codigo = uniqid();

        $Resultado = $this->Query_Model->ConsultaClienteExistente($TelefonoCliente,$CorreoCliente);

        if($Resultado!=null){

            $Estado = "True";
            echo json_encode($Estado);

        }else{

            $this->load->library('email');

            $this->email->from('d_m_sos@hotmail.com', 'NaturArtech');
            $this->email->to($CorreoCliente);

            $this->email->subject('Membresia Naturartech');
            $this->email->message('Bienvenido a Naturatech, agradecemos su registro. Su numero de membresia es: ' .$Codigo);

            $this->email->send();

            $DatosCliente = array(
                'nombre' => $NombreCliente, 
                'apaterno' => $ApPaternoCliente, 
                'amaterno' => $ApMaternoCliente, 
                'telefono' => $TelefonoCliente, 
                'email' => $CorreoCliente, 
                'fecha_nacimiento' => $FechaNCliente, 
                'fecha_registro' => $FechaHoraActual, 
                'codigo' => $Codigo, 
                'estado' => '1'
            );
    
            $this->Query_Model->InsertaCliente($DatosCliente);
            
            $Estado = "False";
            echo json_encode($Estado);
        }

    }

    public function ConsultaDatosClienteC(){

        $IDCliente = $this->input->post("IDCliente");
        $Resultado = $this->Query_Model->SeleccionaClientePorID($IDCliente);
        echo json_encode($Resultado);
    }

    public function EditaClienteC(){

        $IDCliente = $this->input->post("IDCliente");
        $NombreCliente = $this->input->post("NombreCliente");
        $ApPaternoCliente = $this->input->post("ApPaternoCliente");
        $ApMaternoCliente = $this->input->post("ApMaternoCliente");
        $TelefonoCliente = $this->input->post("TelefonoCliente");
        $CorreoCliente = $this->input->post("CorreoCliente");
        $FechaNCliente = $this->input->post("FechaNCliente");
        $FechaRegistro = $this->input->post("FechaRegistro");
        $Codigo = $this->input->post("Codigo");
        $EstadoCliente = $this->input->post("EstadoCliente");

        $DatosCliente = array(
            'nombre' => $NombreCliente, 
            'apaterno' => $ApPaternoCliente, 
            'amaterno' => $ApMaternoCliente, 
            'telefono' => $TelefonoCliente, 
            'email' => $CorreoCliente, 
            'fecha_nacimiento' => $FechaNCliente, 
            'fecha_registro' => $FechaRegistro, 
            'codigo' => $Codigo, 
            'estado' => $EstadoCliente
        );

        $this->Query_Model->ActualizaCliente($DatosCliente,$IDCliente);

    }

    public function BorraClienteC(){

        $IDCliente = $this->input->post("IDCliente");
        $this->Query_Model->BorraClienteBD($IDCliente);
        $Resultado = $this->Query_Model->SeleccionaClientePorID($IDCliente);
        $FechaNCliente = $Resultado[0] -> fecha_nacimiento;
        echo json_encode($FechaNCliente);
    }

}
