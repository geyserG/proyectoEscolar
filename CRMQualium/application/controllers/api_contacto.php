<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class Api_contacto extends Api
{

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_contact', 'Contact');
        $this->load->helper('url');
       
    }

    public function api() {

    	switch ($this->metodo()) {
    		case 'post':
    			$this->insert_contact();
    			break;
    		case 'get':
    			$this->get_contact();
    			break;	
    		case 'update':
    			$this->update_contact();
    			break;	
    		case 'delete':
    			$this->delete_contact();
    			break;
    		default:
    			# code...
    			break;
    	}

    }

    function insert_contact(){

    	$thid->Contact->insert_mcontact();

    }

    function get_contact(){
    	
    	$query = $this->Contact->get_mcontact();
    	if($query){

    		$data['json'] = $this->response(200, $query);

    	}else{
    		$data['json'] = $this->response(404, $query);
    	} 
        $this->area_Estatica();
    	$this->load->view('modulo_Clientes');
    	$this->load->view('pruebas', $data);

    }

    function update_contact(){
    	
    	$thid->Contact->update_mcontact();
    }

    function delete_contact(){

    	$thid->Contact->delete_mcontact($id);
    	
    }

 



}//FIN DE LA CLASE