<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Api_contacto extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_contact', 'contacto');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);      

    	switch ($this->metodo()) {
    		case 'post':
    			$this->insert_contacto();
    			break;
    		case 'get':
    			$this->get_contactos($id);
    			break;	
    		case 'put':
                 $this->update_contacto($id);
    			break;	
    		case 'delete':
    			$this->delete_contacto($id);
    			break;
    		default:
    			$this->response('',405);
    			break;
    	}

    }
    
    private function insert_contacto(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->contacto->insert_mcontact($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_contacto($id){

    	$query = $this->contacto->get_p($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_contacto($id){

        $put = $this->put();
    	$query = $this->contacto->update_p($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_contacto($id){

    	$query = $this->contacto->delete_p($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_contacto