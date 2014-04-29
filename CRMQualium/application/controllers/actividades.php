<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

include 'api.php';
class  Actividades extends Api {

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
    			$this->insert_actividad();
    			break;
    		case 'get':
    			$this->get_actividades($id);
    			break;	
    		case 'put':
                 $this->update_actividad($id);
    			break;	
    		case 'delete':
    			$this->delete_actividad($id);
    			break;
    		default:
    			$this->response('',405);
    			break;
    	}

    }
    
    private function insert_actividad(){

        # Con $this->inpost() recuperamos las variables post y lo enviamos al modelo...
        $post  = $this->ipost();         
        $query = $this->actividad->insert_actividad($post);
        # $query regresa true o false y con esto enviamos un codigo de respuesta al cliente...
        ($query) ? $this->response($query, 201) : $this->response($query, 406);
    }

    private function get_actividades($id){

    	$query = $this->actividad->get_actividades($id);                        
    	($query) ? $this->response($query, 302) : $this->response($query, 404);
    	
    }

    private function update_actividad($id){

        $put   = $this->put();
    	$query = $this->actividad->update_actividad($id, $put);
        ($query) ? $this->response($query, 200) : $this->response($query, 204);        
    }

    private function delete_actividad($id){

    	$query = $this->actividad->delete_p($id);    	
        ($query) ? $this->response($query, 200) : $this->response($query, 406);        
    }

} # Fin de la Clase Actividades...