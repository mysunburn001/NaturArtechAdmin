<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class File extends MY_Controller {

    //Funcion para enmascara el path absoluto de las imagenes
    public function getdocument($file_path, $mime_type = 'image/jpeg'){
        $this->load->helper('file');
        
        $filename = $file_path;
        $file_system_path = "C:".DIRECTORY_SEPARATOR."xampp".DIRECTORY_SEPARATOR."htdocs".DIRECTORY_SEPARATOR."DIEZKA".DIRECTORY_SEPARATOR."application".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR.$filename;
        //$file_system_path = "/home".DIRECTORY_SEPARATOR."ez8la22yqbqh".DIRECTORY_SEPARATOR."public_html".DIRECTORY_SEPARATOR."ImagesN".DIRECTORY_SEPARATOR.$filename;
        $file_content = read_file($file_system_path);
        
        if($file_content === FALSE){
            show_error('File not found: '.$file_system_path);
            return FALSE;
        }
        
        if($mime_type === TRUE){
    	return $file_content;
        }
        
        header('Content-Length: '.strlen($file_content)); // sends filesize header
        header('Content-Type: '.$mime_type); // send mime-type header
        header('Content-Disposition: inline; filename="'.basename($file_system_path).'";'); // sends filename header
        exit($file_content); // reads and outputs the file onto the output buffer
	}

}
