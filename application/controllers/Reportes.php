<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Reportes extends MY_Controller {
        
    public function __construct() {
        parent::__construct();
    }

    public function Reporte1(){
        $data['tabTitle'] = "NaturArtech - Reporte 1";
        $data['pagecontent'] = "reportes/reporte1";
        
        $this->loadpageintotemplate($data);
       
   }

}
