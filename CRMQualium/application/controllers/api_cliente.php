<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

//class  Cliente extends CI_Controller {
include 'api.php';
class  Api_cliente extends Api {

	public function __construct() {
        parent::__construct();
    	$this->load->model('Model_customer');
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

    	$query = $this->Model_customer->insert_customer();
    	$data = $this->response($query);
    	$this->load->view('',$data);

    }

    private function get_customers(){

    	$query = $this->Model_customer->get_customers_model();
    	if($query){

    		$data = $this->response(200, $query);

    	}else{
    		$data = $this->response(404, $query);
    	} 
    	    $this->area_Estatica();
    		$this->load->view('modulo_Clientes');
    		$this->load->view($this->ruta());
    	
    }

    private function update(){

    	// $query = $this->Model_customer->update_customer();
    	// $data = $this->response('',$query);
    	// $this->load->view('', $data);
    	
    	//Regresa el id del cliente insertado.
    	$cliente_id = $this->insert($this->input->post('nombreComercial'));

    	$this->input->post('nombreFiscal');
    	$this->input->post('tipoCliente');
    	$this->input->post('email');
    	$this->input->post('giro');
    	$this->input->post('direccion');
    	$this->input->post('rfc');
    	$this->input->post('comentario');
    	$this->input->post('representate');
    	$this->input->post('paginaWeb');

    	$telefonos = $this->input->post('telefonos');//posible arreglo de objetos
    	$this->input->post('serviciosInteres');
    	$this->input->post('serviciosCuenta');//Puede venir un arreglo
    	$this->input->post('archivos');//Pendiente de como pasarlo 	        
    	$contactos = $this->input->post('nombreContacto');//Verificar si es un arreglo
    	$correo_contacto = $this->input->post('correoContacto');//Verificar si es un arreglo
    	$this->input->post('cargoContacto');//Verificar si es un arreglo
    	$this->input->post('telefonosContacto');//Verificar si es un arreglo
    	
    	//$cliente_atributos = array('cliente_id' => , $cliente_id);

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

