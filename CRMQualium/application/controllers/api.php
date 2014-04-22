<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class  Api extends CI_Controller {

	 public function __construct() {
         parent::__construct();
         $this->load->library('My_functions');
        
     }
    public function metodo(){

    	return strtolower($_SERVER['REQUEST_METHOD']);
    }

    //...Funcion que carga la estructura inicial...//...cabecera..//menu...
	public function area_Estatica(){
		$this->load->view('cabecra_y_menu.html');
		$this->load->view('header');
		$this->load->view('menu');
	}

	protected function response($status, $data)
	{

		$status_message = $this->request_status($status);
		header("HTTP/1.1 $status $status_message");
        header("Access-Control-Allow-Orgin: *");
        header("Access-Control-Allow-Methods: *");
        header("Content-Type: application/json");
                
        $response['status'] = $status;
        $response['status_message'] = $status_message;
        $response['data'] = $data;
        return $response;//json_encode($response);
    }
	public function ruta()
	{
		return $this->uri->segment(1);		
	}
	
	private function request_status($code)
	{
		$status = array(  
            200 => 'OK',
            404 => 'Not Found',   
            405 => 'Method Not Allowed',
            500 => 'Internal Server Error',
        ); 
        foreach ($status as $key => $value) {
             
             if($key==$code)
             {
                return $value;
             }
         } 
    
	}


}