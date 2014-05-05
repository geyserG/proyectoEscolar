<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class Representante extends Api {

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
    			$this->insert_representante();
    			break;
    		case 'get':
    			$this->get_representantes($id);
    			break;	
    		case 'put':
                 $this->update_representante($id);
    			break;	
    		case 'delete':
    			$this->delete_representante($id);
    			break;
    		default:
    			$this->response('',405);
    			break;
    	}

    }
    
    private function insert_representante(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->representante->insert_r($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_representante($id){

    	$query = $this->representante->get_r($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_representante($id){

        $put = $this->put();
    	$query = $this->representante->update_r($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_representante($id){

    	$query = $this->representante->delete_r($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_contacto