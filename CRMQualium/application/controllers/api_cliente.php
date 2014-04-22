<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class  Cliente extends CI_Controller {
include 'api.php';
class  Api_cliente extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_customer', 'Customer');
        $this->load->helper('url');
       
    }

    public function api() {

    	switch ($this->metodo()) {
    		case 'post':
    			$this->insert();
    			break;
    		case 'get':
    			$this->get_customers();
    			break;	
    		case 'update':
    			$this->update();
    			break;	
    		case 'delete':
    			$this->delete();
    			break;
    		default:
    			# code...
    			break;
    	}

    }

    private function insert(){

    	$query = $this->Customer->insert_customer();
    	$data = $this->response($query);
    	$this->load->view('',$data);

    }

    private function get_customers(){

    	$query = $this->Customer->get_customers_model();
                        
    	if($query){

    		$data['json'] = $this->response(200, $query);

    	}else{
    		$data['json'] = $this->response(404, $query);
    	} 
        $this->area_Estatica();
    	$this->load->view('modulo_Clientes');
    	$this->load->view('pruebas', $data);
    	
    }

    private function update(){

    	// $query = $this->Model_customer->update_customer();
    	// $data = $this->response('',$query);
    	// $this->load->view('', $data);
    	


    }

    private function delete(){

    	$query = $this->Model_customer->delete_customer();
    	$data = $this->response('',$query);
    	$this->load->view('', $data);

    }



    // POSIBLES ARREGLOS DE OBJETOS
    // TELEFONOS PUEDE LLEGAR UN OBJETO O UN ARREGLO DE OBJETOS
    // SERIVICIOS INTERES Y SERVICIOS CON LOS QUE CUENTA LLEGAN COMO ARREGLOS O NULOS
    // LOS  ARCHIVOS ARREGLO DE OBJETOS O SOLO UN OBJETO
    // TELEFONOS DEL REPRESENTANTE
    // UN ARREGLO DE CONTACTOS



}

