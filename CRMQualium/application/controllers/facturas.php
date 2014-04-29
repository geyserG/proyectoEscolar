<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Api_telefono extends Api {

	public function __construct() {
        parent::__construct();
        $this->load->model('Model_phone', 'phone');             
    }

    public function api() {

        # Con esta funcion obtnemos el id de la petición.
        # get(), update(), delete()
        $id = $this->uri->segment(2);      

    	switch ($this->metodo()) {
    		case 'post':
    			$this->insert_phone();
    			break;
    		case 'get':
    			$this->get_phones($id);
    			break;	
    		case 'put':
                 $this->update_phone($id);
    			break;	
    		case 'delete':
    			$this->delete_phone($id);
    			break;
    		default:
    			$this->response('',405);
    			break;
    	}

    }
    
    private function insert_phone(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post = $this->ipost();         
        $query = $this->phone->insert_p($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_phones($id){

    	$query = $this->phone->get_p($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_phone($id){

        $put = $this->put();
    	$query = $this->phone->update_p($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_phone($id){

    	$query = $this->phone->delete_p($id);    	
        ($query)? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Api_cliente