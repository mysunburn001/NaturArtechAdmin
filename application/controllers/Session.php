<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Session extends CI_Controller {
    
    private $redirectURL;

    
    public function __construct() {
        parent::__construct();
        $this->loaddependencies();
    }
    
    public function index(){
        $data['tabTitle'] = "Inicio de sesion - NaturArtech";
        $this->load->view('templates/login',$data);
  
    }
    
    public function logout(){
        $user = $this->session->userdata('user');
        $this->Session_Model->CloseSession($user);
        $this->session->sess_destroy();
        redirect('Session', 'refresh');
    }

    public function SinJava(){
        $user = $this->session->userdata('user');
        $this->Session_Model->CloseSession($user);
        $this->session->sess_destroy();
        redirect('../', 'refresh');
    }
    
    public function validatelogin(){
        
        $user = $this->input->post('user');
        $pass = $this->input->post('pass');

        $userSinSesion = $this->Session_Model->CheckSession($user);
        $valores = count($userSinSesion);
        if ($valores == 0) {
            $userExist = $this->Session_Model->checkinourdb($user);
            if($userExist->valido){
                $userValid = $this->Session_Model->checkinactivedirectory($user,$pass);
                if($userValid->valido){
                    $this->setsession('user', $userValid->user);
                    $this->setsession('name', $userValid->name);
                    $this->setsession('tipo_user', $userValid->tipo_user);
                    $user = $userValid->user;
                    $tipo_user = $userValid->tipo_user;
                    $this->Session_Model->TablaSesiones($user,$tipo_user);
                    echo json_encode("OK-".$this->redirectURL = $this->findredirecturl());
                }else{
                    echo json_encode('IUOP'); //Error: Incorrect User Or Password
                }
            }else{
                echo json_encode('UWOA'); //Error: User Without Access  
            }
        }else{

            echo json_encode("UWAS"); //Error: User With Active Session
        }
           
    }

    function validateloginweb(){

        $Membresia = $this->input->post('Membresia
        ');

        $userExist = $this->Session_Model->checkinourdbweb($Membresia);
        if($userExist->valido){
            $userValid = $this->Session_Model->checkinactivedirectory($user,$pass);
            if($userValid->valido){
                $this->setsession('user', $userValid->user);
                $this->setsession('name', $userValid->name);
                $this->setsession('tipo_user', $userValid->tipo_user);
                $user = $userValid->user;
                $tipo_user = $userValid->tipo_user;
                $this->Session_Model->TablaSesiones($user,$tipo_user);
                echo json_encode("OK-".$this->redirectURL = $this->findredirecturl());
            }else{
                echo json_encode('IUOP'); //Error: Incorrect User Or Password
            }
        }else{
            echo json_encode('UWOA'); //Error: User Without Access  
        }
       
    }

    public function ResetLogin(){

        $user = $this->input->post("userreset");
        $pass = $this->input->post("passreset");

        $UserExist = $this->Session_Model->checkinourdbreset($user);
        if ($UserExist->valido) {
            $userValid = $this->Session_Model->checkinactivedirectoryreset($user,$pass);
            if($userValid->valido){

                $this->Session_Model->ResetSesion($user);
                echo json_encode("OK");
            }else{
                echo json_encode("IUOP");
            }
        
        }else{
            echo json_encode("UWOA");
        }
    }
  
    private function findredirecturl(){

        if ($this->session->userdata('redirect')){
            $url = $this->session->userdata('redirect');
            $this->session->unset_userdata('redirect');
        } else{
            $url = "Dashboard"; //Choose the default controller to access after the validation of the user and password
        }
        return $url;
    }
    
    private function setsession($type,$value){
        $newdata = array( 
            $type => $value 
        );
        $this->session->set_userdata($newdata);
    }
    
    private function validationrules(){
        $this->form_validation->set_rules('user', '"Usuario"', 'required|trim');
        $this->form_validation->set_rules('pass', '"Contraseña"', 'required|trim');
    }
    
    protected function loaddependencies(){
        $this->load->model('Session_Model');
    }

    public function EstadoU(){

        $user = $this->session->userdata('user');
        $res = $this->Session_Model->UsuActivo($user);
        echo json_encode($res);
    }

    public function GuardaErrorSC(){

        $CodigoError = $this->input->post("CodigoError");
        $DescripcionError = $this->input->post("DescripcionError");
        $Origen = $this->input->post("Origen");
        date_default_timezone_set('America/Mexico_City');
        $FechaHoraActual = date('Y-m-d H:i:s');
    
        $DatosError = array(
            'codigo' => $CodigoError, 
            'descripcion' => $DescripcionError, 
            'origen' => $Origen, 
            'usuario' => "N/A",
            'fecha_error' => $FechaHoraActual,
        );
    
        $this->Query_Model->InsertaError($DatosError);
    
    }

    /*START Clientes*/
    
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

    /*END Clientes*/

}