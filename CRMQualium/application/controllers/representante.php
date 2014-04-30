<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Representante extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Modelo_representante', 'representante');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);      

    	switch ($this->metodo()) {
    		case 'post':
    			$this->insert_representate();
    			break;
    		case 'get':
    			$this->get_representates($id);
    			break;	
    		case 'put':
                 $this->update_representate($id);
    			break;	
    		case 'delete':
    			$this->delete_representate($id);
    			break;
    		default:
    			$this->response('',405);
    			break;
    	}

    }
    
    private function insert_representate(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->representante->insert_r($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_representate($id){

    	$query = $this->representante->get_r($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_representate($id){

        $put = $this->put();
    	$query = $this->representante->update_r($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_representate($id){

    	$query = $this->representante->delete_r($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_contacto